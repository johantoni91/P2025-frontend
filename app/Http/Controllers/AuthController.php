<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use App\Http\Requests\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function error404()
    {
        return view('Errors.404', [
            'dashboard' => Shortcut::access()
        ]);
    }

    function loginView()
    {
        if (Session::has('user')) {
            return redirect('/');
        }
        $user = Endpoint::get('log-in/id');
        $layout = Endpoint::get('layout');
        if ($layout['status'] == false) {
            return view('Errors.500');
        }

        // Default & left layout view are same
        return view('Auth.login.index', [
            'user'      => $user['data'],
            'layout'    => $layout['data'][0],
            'home'      => 'Login'
        ]);
    }

    function login(Auth $req)
    {
        try {
            $param = [
                'email'         => $req->email,
                'password'      => $req->password,
            ];
            $res = Endpoint::post('login', null, $param);
            $layout = Endpoint::get('layout')['data'][0];
            if ($res['status'] == false) {
                Alert::error($res['error'] ?? $res['message']);
                return back();
            }

            Session::push('user', $res['data']['user']);
            Session::push('role', $res['data']['role']);
            Session::push('layout', $layout);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }

    public function refreshCaptcha()
    {
        $array = array("math");
        return response()->json([
            'captcha' => captcha_img($array[rand(0, count($array) - 1)])
        ]);
    }

    function loginWithFace(Request $req)
    {
        try {
            $face = Endpoint::get('recognition')['data'][0];
            $face_recog = [
                'mask'          => $req->res['result'][0]['mask']['value'],
                'similarity'    => $req->res['result'][0]['subjects'][0]['similarity']
            ];

            if (($face_recog['similarity'] >= $face['similarity'] / 100) && ($face_recog['mask'] == $face['mask'])) {
                $res = Endpoint::post('login-face', null, [
                    'face'          => $req->res['result'][0]['subjects'][0]['subject'],
                ]);

                $layout = Endpoint::get('layout')['data'][0];
                if ($res['status'] == false) {
                    return response()->json([
                        'status'    => false,
                        'message'   => $res['error'] ?? $res['message']
                    ]);
                } else {
                    Session::push('user', $res['data']['user']);
                    Session::push('role', $res['data']['role']);
                    Session::push('layout', $layout);
                    return response()->json([
                        'status'    => true
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Wajah tidak dikenali',
                    'masker'    => $face['mask'] == 'without_mask' ? 'Mohon lepas masker' : 'Mohon gunakan masker'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => $th->getMessage()
            ]);
        }
    }

    function loginWithToken(Request $req)
    {
        try {
            $res = Endpoint::post('login-token', null, ['token' => $req->token]);
            if ($res['status'] == false) {
                Alert::error($res['error'] ?? $res['message']);
                return back();
            }

            $layout = Endpoint::get('layout')['data'][0];
            Session::push('user', $res['data']['user']);
            Session::push('role', $res['data']['role']);
            Session::push('layout', $layout);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }

    function logout()
    {
        $res = Endpoint::get('logout', session('user')[0]['remember_token']);
        if ($res['status'] == false) {
            Alert::error('Logout Gagal', $res['message']);
            return back();
        }
        Session::flush();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Http\Requests\Auth;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function loginView()
    {
        if (Session::has('user')) {
            return redirect('/');
        }
        $layout = Endpoint::get('layout')['data'][0];

        // Default & left layout view are same
        return view('Auth.login.index', [
            'layout'    => $layout,
            'home'      => 'Login'
        ]);
    }

    function login(Auth $req)
    {
        $agent = new Agent();
        try {
            $param = [
                'email'         => $req->email,
                'password'      => $req->password,
                'ip_address'    => $req->ip(),
                'user_agent'    => $req->header('User-Agent'),
                'url'           => $req->fullUrl(),
                'location'      => '',
                'message'       => 'Login',
                'additional'    => json_encode([
                    'Robot'         => $agent->isRobot(),
                    'Device'        => $agent->device(),
                    'Browser'       => $agent->browser(),
                    'Referer'       => $req->header('referer'),
                    'Language'      => $req->header('Accept-Language'),
                    'Authorization' => $req->header('Authorization'),
                    'Port'          => $req->getPort(),
                    'content_type'  => $req->header('Content-Type')
                ]),
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
        $array = array("math", "flat", "mini", "inverse");
        return response()->json([
            'captcha' => captcha_img($array[rand(0, count($array) - 1)])
        ]);
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

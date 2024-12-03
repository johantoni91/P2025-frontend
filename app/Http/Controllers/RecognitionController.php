<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RecognitionController extends Controller
{
    function index()
    {
        try {
            $data = Endpoint::get('recognition');
            return view('Auth.Recognition.index', [
                'data'  => $data['data'][0],
                'view'  => 'Auth.Recognition.index',
                'home'  => 'recognition',
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            Session::flush();
            return redirect()->route('login');
        }
    }

    function update(Request $req, $id)
    {
        try {
            $param = [
                'mask'       => $req->mask,
                // 'gender'     => $req->gender,
                'similarity' => intval($req->similarity)
            ];

            $update = Endpoint::post('recognition/update/' . $id, session('user')[0]['remember_token'], $param);
            if ($update['status'] == false) {
                Alert::error('Gagal update', $update['error'] ?? $update['message']);
                return back();
            }
            Alert::success($update['message']);
            return back();
        } catch (\Throwable $th) {
            Alert::warning($th->getMessage());
            return back();
        }
    }
}

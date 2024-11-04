<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use App\Http\Requests\LayoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('Auth.edit', [
                'data'  => Endpoint::get('layout')['data'][0],
                'view'  => 'Auth.edit',
                'home'  => 'layout.index',
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            Session::flush();
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LayoutRequest $req)
    {
        $attach = [];
        $param = [
            'app_name'       => $req->app_name,
            'short_app_name' => $req->short_app_name,
            'header'         => $req->header,
            'footer'         => $req->footer,
            'fullscreen'     => $req->fullscreen,
            'login_position' => $req->login_position
        ];

        if ($req->hasFile('img_login_bg')) {
            $attach['img_login_bg'] = [
                'name'      => 'img_login_bg',
                'content'   => file_get_contents($req->file('img_login_bg')),
                'filename'  => rand() . '.' . $req->file('img_login_bg')->getClientOriginalExtension()
            ];
            $param['img_login_bg'] = $req->file('img_login_bg');
        }

        if ($req->hasFile('icon')) {
            $attach['icon'] = [
                'name'      => 'icon',
                'content'   => file_get_contents($req->file('icon')),
                'filename'  => rand() . '.' . $req->file('icon')->getClientOriginalExtension()
            ];
            $param['icon'] = $req->file('icon');
        }

        $res = Endpoint::postMultiAttach('layout/update/' . session('layout')[0]['id'], session('user')[0]['remember_token'], $param, $attach);
        if ($res['status'] == true) {
            Session::put('layout', $res['data']);
            Alert::success($res['message']);
            return back();
        } else {
            Alert::error($res['error'] ?? $res['message']);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

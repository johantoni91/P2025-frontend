<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    private $url = 'role';
    private $home = 'role.index';
    private $view = 'Role.index';

    public function index()
    {
        $res = Endpoint::get($this->url, session('user')[0]['remember_token']);
        return view($this->view, [
            'data'  => $res['data'],
            'view'  => $this->view,
            'url'   => $this->url,
            'home'  => $this->home,
            'dashboard' => Shortcut::access()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $param = [
            'role_name' => $req->role_name
        ];

        $res = Endpoint::post($this->url . '/store', session('user')[0]['remember_token'], $param);
        if ($res['status'] == false) {
            Alert::error($res['error'] ?? $res['message']);
            return back();
        }

        Alert::success($res['message']);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function update(Request $req, string $id)
    {
        $param = [
            'modules_id'    => $req->modul,
            'status'        => $req->status,
            'dashboard'     => $req->dashboard,
            'permission'    => $req->permission
        ];

        $res = Endpoint::post($this->url . '/update' . '/' . $id, session('user')[0]['remember_token'], $param);
        if ($res['status'] == false) {
            Alert::error('Gagal', $res['error'] ?? $res['message']);
            return back();
        }

        Alert::success('Berhasil', $res['message']);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

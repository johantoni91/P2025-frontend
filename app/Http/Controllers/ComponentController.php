<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ComponentController extends Controller
{
    function pagination($view, $link, $url, $home)
    {
        try {
            $data = Http::withToken(session('user')[0]['remember_token'])->get(decrypt($link))->json();
            $role = Endpoint::get('role', session('user')[0]['remember_token'])['data']['role'];
            return view($view, [
                'view'  => $view,
                'data'  => $data['data'],
                'url'   => $url,
                'home'  => $home,
                'roles'     => $role,
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            Alert::warning('Peringatan', 'Sudah awal / akhir halaman!');
            return back();
        }
    }

    function search($url)
    {
        try {
            $res = Http::withToken(session('user')[0]['remember_token'])
                ->get(env('API_URL', 'http://localhost:8001/api/v1/') . $url . '/search', request()->except(['_token', 'view', 'home']))->json();
            $role = Endpoint::get('role', session('user')[0]['remember_token'])['data']['role'];
            return view(request('view'), [
                'view'      => request('view'),
                'data'      => $res['data'],
                'url'       => $url,
                'home'      => request('home'),
                'i'         => request()->except(['_token', 'view', 'home']),
                'roles'     => $role,
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Silahkan isi input dengan benar');
            return back();
        }
    }
}

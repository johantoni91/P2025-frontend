<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private $url = 'dashboard';
    private $view = 'Dashboard.index';

    function index()
    {
        try {
            $res = Endpoint::get($this->url, session('user')[0]['remember_token']);
            $user = [];
            foreach ($res['data']['graph_user'] as $i) {
                $user['categories'][] = Carbon::parse(strtotime($i["date"]))->translatedFormat("l, d F Y");
                $user['data'][] = $i['count'];
            }
            $log = [];
            foreach ($res['data']['graph_log'] as $i) {
                $log['categories'][] = Carbon::parse(strtotime($i["date"]))->translatedFormat("l, d F Y");
                $log['data'][] = $i['count'];
            }
            $role = [];
            foreach ($res['data']['graph_role'] as $i) {
                $role['categories'][] = Carbon::parse(strtotime($i["date"]))->translatedFormat("l, d F Y");
                $role['data'][] = $i['count'];
            }

            return view('Dashboard.index', [
                'data'   => $res['data'],
                'user'    => $user,
                'log'    => $log,
                'role'    => $role,
                'view'   => $this->view,
                'url'    => $this->url,
                'home'   => $this->url,
                'dashboard' => Shortcut::access()
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}

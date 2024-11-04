<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    private $url = 'dashboard';
    private $view = 'Dashboard.index';

    function index()
    {
        $res = Endpoint::get($this->url, session('user')[0]['remember_token']);
        return view('Dashboard.index', [
            'data'   => $res['data'],
            'view'   => $this->view,
            'url'    => $this->url,
            'home'   => $this->url,
            'dashboard' => Shortcut::access()
        ]);
    }
}

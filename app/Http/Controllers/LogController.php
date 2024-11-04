<?php

namespace App\Http\Controllers;

use app\API\Endpoint;
use App\Exports\LogExport;
use App\Helpers\Shortcut;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LogController extends Controller
{
    private $url = 'log';
    private $view = 'Log.index';

    function index()
    {
        $res = Endpoint::get($this->url, session('user')[0]['remember_token']);
        return view($this->view, [
            'data'  => $res['data'],
            'view'  => $this->view,
            'url'   => $this->url,
            'home' => $this->url,
            'dashboard' => Shortcut::access()
        ]);
    }

    public function pdf()
    {
        $res = Endpoint::get($this->url . '/all', session('user')[0]['remember_token'])['data'];
        $pdf = Pdf::loadView('Log.pdf', ['data' => $res]);
        return $pdf->download('Rekap_Aktivitas_P2025.pdf');
    }

    public function excel()
    {
        return Excel::download(new LogExport, 'Rekap_Aktivitas_P2025.xlsx');
    }
}

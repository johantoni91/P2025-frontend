<?php

namespace App\Helpers;

use app\API\Endpoint;
use RealRashid\SweetAlert\Facades\Alert;

class Shortcut
{
    public static function success($msg)
    {
        Alert::success('Berhasil', $msg);
        return back();
    }

    public static function error($msg)
    {
        Alert::error('Gagal', $msg);
        return back();
    }

    public static function access()
    {
        $dashboard = array_filter(session('role')[0], function ($val) {
            return $val['module']['route'] == 'dashboard' ? $val : false;
        });
        $users = array_filter(session('role')[0], function ($val) {
            return $val['module']['route'] == 'users' ? $val : false;
        });
        $log = array_filter(session('role')[0], function ($val) {
            return $val['module']['route'] == 'log' ? $val : false;
        });
        $layout = array_filter(session('role')[0], function ($val) {
            return $val['module']['route'] == 'layout' ? $val : false;
        });
        $role = array_filter(session('role')[0], function ($val) {
            return $val['module']['route'] == 'role' ? $val : false;
        });

        $recog = Endpoint::get('recognition');

        return [
            'users'     => $users,
            'dashboard' => $dashboard,
            'log'       => $log,
            'layout'    => $layout,
            'role'      => $role,
            'recog'     => $recog['data']
        ];
    }
}

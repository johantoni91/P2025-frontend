<?php

namespace app\API;

use Illuminate\Support\Facades\Http;

class Endpoint
{
    public static function get($url, $token = null, $query = [])
    {
        $path = env('API_URL', 'http://localhost:8001/api/v1/');
        if ($token) {
            return Http::withToken($token)->get($path . $url, $query)->json();
        } else {
            return Http::get($path . $url, $query)->json();
        }
    }

    public static function post($url, $token = null, $param = [])
    {
        $path = env('API_URL', 'http://localhost:8001/api/v1/');
        if ($token) {
            return Http::withToken($token)->post($path . $url, $param)->json();
        } else {
            return Http::post($path . $url, $param)->json();
        }
    }

    public static function postAttach($url, $token = null, $param, $attach)
    {
        $path = env('API_URL', 'http://localhost:8001/api/v1/');
        return Http::withToken($token)->attach($attach['name'], $attach['content'], $attach['filename'])->post($path . $url, $param)->json();
    }

    public static function postMultiAttach($url, $token = null, $param, $attach)
    {
        $path = env('API_URL', 'http://localhost:8001/api/v1/');
        $res = Http::withToken($token);
        foreach ($attach as $i) {
            $res->attach($i['name'], $i['content'], $i['filename']);
        }
        return $res->post($path . $url, $param)->json();
    }


    public static function resToView($status, $msg, $statusCode = 200, $err = null)
    {
        return response()->json([
            'status'    => $status,
            'message'   => $msg,
            'error'     => $err
        ], $statusCode);
    }
}

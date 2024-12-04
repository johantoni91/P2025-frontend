<?php

namespace App\Http\Middleware;

use app\API\Endpoint;
use App\Helpers\Shortcut;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $agent = new Agent();
            $response = new HttpResponse();
            if (session('user') == null) {
                Session::flush();
                return redirect('/login');
            }
            $param = [
                'username'      => session('user')[0]['name'],
                'action'        => '[' . $request->method() . ']' . ' ' . $request->url(),
                'entity'        => 'user',
                'entity_id'     => session('user')[0]['id'],
                'ip_address'    => $request->ip(),
                'status_code'   => $response->status() ?? '200',
                'user_agent'    => $request->header('User-Agent'),
                'url'           => $request->fullUrl(),
                'location'      => '',
                'message'       => $request->route()->getName(),
                'additional'    => json_encode([
                    'Robot'         => $agent->isRobot(),
                    'Device'        => $agent->device(),
                    'Browser'       => $agent->browser(),
                    'Referer'       => $request->header('referer'),
                    'Language'      => $request->header('Accept-Language'),
                    'Authorization' => $request->header('Authorization'),
                    'Port'          => $request->getPort(),
                    'content_type'  => $request->header('Content-Type')
                ]),
                'created_at'    => Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s')
            ];
            $res = Endpoint::post('log/store', session('user')[0]['remember_token'], $param);
            if ($res['status'] == false) {
                Session::flush();
                return redirect('/login');
            }
            return $next($request);
        } catch (\Throwable $th) {
            Session::flush();
            return redirect('/login');
        }
    }
}

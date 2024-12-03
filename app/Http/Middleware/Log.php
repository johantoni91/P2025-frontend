<?php

namespace App\Http\Middleware;

use App\Helpers\Shortcut;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $log = Shortcut::access()['log'];
        if (count($log) != 0) {
            if (current($log)['status'] == '1') {
                return $next($request);
            } else {
                return redirect('not-found');
            }
        }
    }
}

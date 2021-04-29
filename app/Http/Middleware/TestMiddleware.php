<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
            return redirect('/');
        }

        return $next($request);
    }
}

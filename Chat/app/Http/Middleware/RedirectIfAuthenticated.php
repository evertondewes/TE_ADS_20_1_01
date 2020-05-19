<?php

namespace App\Http\Middleware;


use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

//        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', print_r($guard, true) . PHP_EOL, FILE_APPEND );

//        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', print_r($next, true) . PHP_EOL, FILE_APPEND );

        if (Auth::guard($guard)->check()) {
            file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

            return redirect(RouteServiceProvider::HOME);
        }
        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

        return $next($request);
    }
}

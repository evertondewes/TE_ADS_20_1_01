<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );

        $this->middleware('guest')->except('logout');
    }
//
//    public function authenticate(Request $request)
//    {
//        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );
//
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//        }
//    }
//
////    public function attemptLogin($request)
////    {
////        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', dump($request) . PHP_EOL, FILE_APPEND );
////
////        $r = parent::attemptLogin($request);
////        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', dump($r) . PHP_EOL, FILE_APPEND );
////
////        return $r;
////    }
//
//    public function authenticated( App\Http\Controllers\Auth\Request $request)
//    {
//        file_put_contents('c:\\tmp\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', PHP_EOL, FILE_APPEND );
//
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//        }
//    }
}

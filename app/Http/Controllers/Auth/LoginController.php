<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
<<<<<<< HEAD
        
        $input = $request->all();
        
=======
        $salt="a1Bz20ydqelm8m1wql";
        $input = $request->all();

>>>>>>> 18d8d620c809a299443f4c3b9addc43e29d86b62
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        
        if (auth()->attempt(array('email' => $input['email'], 'password' =>
        $input['password']))) {
            if (auth()->user()->role == 1) {
                return redirect('/dashboard')->with('success', "Berhasil masuk!");
            } elseif (auth()->user()->role == 0) {
                return redirect('/')->with('success', "Berhasil masuk!");
            }
        } else {
            Alert::warning('Failed', 'Email atau sandi Salah!');
            return redirect()->route('login');
        }
    }
}

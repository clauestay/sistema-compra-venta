<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //  use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validatelogin($request);

        if(Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password,'condicion'=>1])){
            return redirect()->route('main');
        }

        return back()->withErrors(['usuario' => trans('auth.failed')])//devuelve el error con un mensaje desde auth.failed
        ->withInput(request(['usuario']));//devuelve el usuario
    }

    protected function validatelogin(Request $request){
        $this->validate($request,[
            'usuario' => 'required|string',
            'usuario' => 'required|string'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }


}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest')->except('makeLogout');
    }


    public function makeLogin(Request $request)
    {
        $validator = $this->validator($request->only(['email', 'password']));

        $remember = $request->input('remember', false);
          

        if($validator->fails()){
           return redirect()->route('login')
           ->withErrors($validator)
           ->withInput();
        } 

        if(Auth::attempt($validator->validated(),$remember)){
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
          
            return redirect()->route('login');
        }
      
    }

    protected function validator(array $credentials)
    {
        return Validator::make($credentials,[
            'email' => ['required', 'string', 'email','max:100'],
            'password' => ['required', 'string', 'min:8'],
           
        ]);
    }

    public function makeLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}

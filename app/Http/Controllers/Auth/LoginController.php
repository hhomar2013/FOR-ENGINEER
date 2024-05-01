<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;

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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
//        $this->middleware('guest:customer')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['route' => route('admin.login-view'),'role'=>'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $rules =[
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ];
       $validate = Validator::make($request->only(['email','password']),$rules);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }


        return back()->withInput($request->only('email', 'remember'))->withErrors($validate->errors());
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->redirectTo(app()->getLocale().'/');
    }

    public function logout_user(Request $request){
        Auth::guard('users')->logout();
        Auth::guard('admin')->logout();
//        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showCompanyLogin()
    {
        return view('auth.login', ['route' => route('company.login-view'),'role'=>'Customer']);
    }

    public function companyLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('company')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/company');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}

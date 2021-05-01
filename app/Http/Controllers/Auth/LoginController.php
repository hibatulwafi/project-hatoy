<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller 
{
    use AuthenticatesUsers;
    protected $redirectTo = '/index';

    public function __construct()
    {
        $this->middleware('guest:login')->except('logout');
    }

    public function username()
    {
            return 'email';
    }
    protected function guard()
    {
        return Auth::guard('login');
    }

    public function loginform()
    {   
        return view('auth.login');
    }
    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('/login');
    }

}
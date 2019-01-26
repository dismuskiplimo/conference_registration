<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\User;

use Session;

use Mail;

class AuthController extends Controller
{  
    protected $logged_in_route = 'dashboard',
              $logged_out_route = 'login';

    public function showSignup()
    {
        if(env('APP_ENV') == 'production'){
            return redirect()->route($this->logged_out_route);
        }

        if(Auth::check()){
            return redirect()->route($this->logged_in_route);
        }

        return view('pages.signup', [
            'page' => 'Register',
        ]);
    }

    public function postSignup(Request $request)
    {
        if(Auth::check()){
            return redirect()->route($this->logged_in_route);
        }

        $this->validate($request, [
            'fname'     => 'required|max:255',
            'lname'     => 'required|max:255',
            'username'  => 'required|unique:users,username|max:255',
            'email'     => 'required|email|max:255',
            'password'  => 'required|unique:users,username|max:255|confirmed',
        ]);

        $user           = new User;
        $user->fname    = $request->fname;
        $user->lname    = $request->lname;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = 1;
        $user->save();

        Auth::login($user);

        return redirect()->route($this->logged_in_route);
    }


    public function showLogin()
    {
        if(Auth::check()){
            return redirect()->route($this->logged_in_route);
        }

        return view('pages.login', [
            'page' => 'Login',
        ]);
    }

    public function postLogin(Request $request)
    {
        if(Auth::check()){
            return redirect()->route($this->logged_in_route);
        }

        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $remember = $request->has('remember');

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)){
            return redirect()->route($this->logged_in_route);
        }

        Session::flash('error', 'Invalid Login');
        return redirect()->back()->withInput();
    }

    public function logout(){
        Auth::logout();

        Session::flash('success', 'Logged Out');

        return redirect()->route($this->logged_out_route);
    }
}

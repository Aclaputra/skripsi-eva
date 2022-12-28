<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller {
    // views
    // registration used only on admin dashboard
    public function registration() {return view('registration');}
    public function login() {return view('login');}

    // register and login function
    public function customLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        $request->validate(['email' => 'required','password' => 'required',]);
        if (Auth::attempt($credentials) && Auth::user()->is_admin == 0) {
            return redirect()->intended('spp/dashboard')->withSuccess('Signed in');
        } elseif(Auth::attempt($credentials) && Auth::user()->is_admin == 1) {
            return redirect()->intended('spp/admin/dashboard')->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess("Login details are not valid");
    }
    public function customRegistration(Request $request) {
        $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect("/spp/dashboard")->withSuccess("You have signed-in");
    }

    // create item new user function
    public function create(array $data) {
        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'is_admin' => 0
        ]);
    }
    public function dashboard() {
        if (Auth::check()) {
            return redirect("/spp/dashboard");
        }
        // #implementThisLater
        // if is_admin = 1 redirect admin.dashboard else is_admin = 0 redirect
        // dashboard mahasiswa
        return redirect("login")->withSuccess("You are not allowed to access");
    }
    public function signOut() {Session::flush();Auth::logout();return Redirect('/spp/login');}
}

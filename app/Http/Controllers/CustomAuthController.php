<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CustomAuthController extends Controller
{

  /**
   * functions
   */
  // registration used only on admin dashboard
  public function reqistration() {return view('admin.registration');}
  public function login() {return view('login');}
  public function customLogin(Request $request) {
    $credentials = $request->only('email', 'password');
    $request->validate(['email' => 'required','password' => 'required',]);
    if (Auth::attempt($credentials)) {
      return redirect()->intended('dashboard')->withSuccess('Signed in');
    }
    return redirect("login")->withSuccess("Login details are not valid");
  }
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
      return view('dashboard');
    }
    // #implementThisLater
    // if is_admin = 1 redirect admin.dashboard else is_admin = 0 redirect
    // dashboard mahasiswa
    return redirect("login")->withSuccess("You are not allowed to access");
  }
  public function signOut() {Session::flush();Auth::logout();return Redirect('login');}
}

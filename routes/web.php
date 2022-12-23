<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  /*
   * if not authenticated redirect to login
   * if authenticated redirect to dashboard or admin dashboard based on
   * is_admin true or false
   */
  return redirect('/spp/login');
});

Route::prefix('spp')->group(function() {

  Route::get("/login", function() {
    return view('login');
  })->name('login');

  // buat controller CRUD with jquery
  Route::get("/dashboard", function() {
    return view('dashboard');
  })->name('mahasiswa.dashboard');

  Route::get('/faq', function() {
    return view('faq');
  })->name('spp.faq');

  // Admin
  Route::prefix('admin')->group(function() {
    Route::get('/dashboard', function() {
      return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/cetak-spp', function() {
      return view('admin.cetak');
    })->name('cetak.spp');
  });
});

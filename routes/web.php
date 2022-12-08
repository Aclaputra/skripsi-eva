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
    return view('welcome');
});

Route::prefix('spp')->group(function() {

  Route::get("/login", function() {
    return view('login');
  })->name('mahasiswa.login');

  // buat controller CRUD
  Route::get("/dashboard", function() {
    return view('dashboard');
  })->name('mahasiswa.dashboard');

  Route::get('/faq')->group(function() {
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

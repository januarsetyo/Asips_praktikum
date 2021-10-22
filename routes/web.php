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
    return view('template/template');
});
Route::get('/login', function () {
    return view('login/login');
});
Route::get('/registration', function () {
    return view('login/registration');
});
Route::get('/dashboard', function () {
    return view('admin/admin');
});
Route::get('/balita', function () {
    return view('master/balita');
});
Route::get('/kecamatan', function () {
    return view('master/kecamatan');
});
Route::get('/kelurahan', function () {
    return view('master/kelurahan');
});
Route::get('/posyandu', function () {
    return view('master/posyandu');
});
Route::get('/role', function () {
    return view('master/role');
});
Route::get('/history', function () {
    return view('laporan/history');
});


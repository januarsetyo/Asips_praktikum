<?php


use App\Http\Controllers\login;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminPosyanduController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
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
Route::get('/', [HomeController::class, 'index']);

//login

Route::get('/login', [login::class, 'index']);
Route::get('/registration', [RegistrationController::class, 'index']);

//admin

Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);

//master

Route::get('/balita', [BalitaController::class, 'index']);
Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kelurahan', [KelurahanController::class, 'index']);
Route::get('/posyandu', [PosyanduController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/role', [RoleController::class, 'index']);
Route::get('/userrole', [UserRoleController::class, 'index']);
Route::get('/adminposyandu', [AdminPosyanduController::class, 'index']);
Route::get('/superadmin', [SuperAdminController::class, 'index']);
Route::get('/orangtua', [OrangTuaController::class, 'index']);

//tambah

Route::get('/tambahkecamatan', [KecamatanController::class, 'tambahkecamatan']);
Route::get('/tambahkelurahan', [KelurahanController::class, 'tambahkelurahan']);
Route::get('/tambahrole', [RoleController::class, 'tambahrole']);
Route::get('/tambahuserrole', [UserRoleController::class, 'tambahuserrole']);
Route::get('/tambahposyandu', [PosyanduController::class, 'tambahposyandu']);
Route::get('/tambahbalita', [BalitaController::class, 'tambahbalita']);
Route::get('/tambahhistory', [HistoryController::class, 'tambahhistory']);

//laporan

Route::get('/history', [HistoryController::class, 'index']);

//form

Route::post('/register-form', [RegistrationController::class, 'store']);
Route::post('/login-form', [login::class, 'authenticate']);
Route::post('/kecamatan-form', [KecamatanController::class, 'store']);
Route::post('/kelurahan-form', [KelurahanController::class, 'store']);
Route::post('/role-form', [RoleController::class, 'store']);
Route::post('/userrole-form', [UserRoleController::class, 'store']);
Route::post('/posyandu-form', [PosyanduController::class, 'store']);
Route::post('/balita-form', [BalitaController::class, 'store']);
Route::post('/history-form', [HistoryController::class, 'store']);

//Edit
Route::post('/edit-kecamatan', [KecamatanController::class, 'editKecamatan']);
Route::post('/edit-kelurahan', [KelurahanController::class, 'editKelurahan']);
Route::post('/edit-posyandu', [PosyanduController::class, 'editPosyandu']);
Route::post('/edit-balita', [BalitaController::class, 'editBalita']);
Route::post('/edit-history', [HistoryController::class, 'editHistory']);
Route::post('/edit-userrole', [UserRoleController::class, 'editUserRole']);


//Update
Route::put('/update-kecamatan{id}', [KecamatanController::class, 'update']);
Route::put('/update-kelurahan{id}', [KelurahanController::class, 'update']);
Route::put('/update-posyandu', [PosyanduController::class, 'update']);
Route::put('/update-balita', [BalitaController::class, 'update']);
Route::put('/update-history', [HistoryController::class, 'update']);
Route::put('/update-userrole', [UserRoleHistoryController::class, 'update']);

//Delete
Route::get('/hapus-kecamatan{id}', [KecamatanController::class, 'delete']);
Route::get('/hapus-kelurahan{id}', [KelurahanController::class, 'delete']);
Route::get('/hapus-posyandu{id}', [PosyanduController::class, 'delete']);
Route::get('/hapus-balita{id}', [BalitaController::class, 'delete']);
Route::get('/hapus-history{id}', [HistoryController::class, 'delete']);
Route::get('/hapus-userrole{id}', [UserRoleController::class, 'delete']);

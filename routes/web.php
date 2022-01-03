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
use GuzzleHttp\Middleware;
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
Route::get('/logout', [login::class, 'logout']);
Route::get('/registration', [RegistrationController::class, 'index']);

//admin

Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/user', [UserController::class, 'index'])->middleware('auth', 'CekRole:1');

//master
Route::group(['middleware' =>['auth', 'CekRole:1']], function(){
    Route::get('/kecamatan', [KecamatanController::class, 'index']);
    Route::get('/kelurahan', [KelurahanController::class, 'index']);
    Route::get('/posyandu', [PosyanduController::class, 'index']);
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/userrole', [UserRoleController::class, 'index']);
    Route::get('/adminposyandu', [AdminPosyanduController::class, 'index']);
    Route::get('/superadmin', [SuperAdminController::class, 'index']);
    Route::get('/orangtua', [OrangTuaController::class, 'index']);
});

Route::group(['middleware' =>['auth', 'CekRole:1,2,3']], function(){
    Route::get('/balita', [BalitaController::class, 'index']);
    Route::get('/history', [HistoryController::class, 'index']);
});


//tambah

Route::get('/tambahkecamatan', [KecamatanController::class, 'tambahkecamatan'])->middleware('auth', 'CekRole:1');
Route::get('/tambahkelurahan', [KelurahanController::class, 'tambahkelurahan'])->middleware('auth', 'CekRole:1');
Route::get('/tambahrole', [RoleController::class, 'tambahrole'])->middleware('auth', 'CekRole:1');
Route::get('/tambahuserrole', [UserRoleController::class, 'tambahuserrole'])->middleware('auth', 'CekRole:1');
Route::get('/tambahposyandu', [PosyanduController::class, 'tambahposyandu'])->middleware('auth', 'CekRole:1');
Route::get('/tambahbalita', [BalitaController::class, 'tambahbalita'])->middleware('auth', 'CekRole:1,2,3');
Route::get('/tambahhistory', [HistoryController::class, 'tambahhistory'])->middleware('auth', 'CekRole:1,2');


//form

Route::post('/register-form', [RegistrationController::class, 'store']);
Route::post('/login-form', [login::class, 'authenticate']);
Route::post('/kecamatan-form', [KecamatanController::class, 'store'])->middleware('auth', 'CekRole:1');
Route::post('/kelurahan-form', [KelurahanController::class, 'store'])->middleware('auth', 'CekRole:1');
Route::post('/role-form', [RoleController::class, 'store'])->middleware('auth', 'CekRole:1');
Route::post('/userrole-form', [UserRoleController::class, 'store'])->middleware('auth', 'CekRole:1');
Route::post('/posyandu-form', [PosyanduController::class, 'store'])->middleware('auth', 'CekRole:1');
Route::post('/balita-form', [BalitaController::class, 'store'])->middleware('auth', 'CekRole:1,2,3');
Route::post('/history-form', [HistoryController::class, 'store'])->middleware('auth', 'CekRole:1,2');

//Edit
Route::post('/edit-kecamatan', [KecamatanController::class, 'editKecamatan'])->middleware('auth', 'CekRole:1');
Route::post('/edit-kelurahan', [KelurahanController::class, 'editKelurahan'])->middleware('auth', 'CekRole:1');
Route::post('/edit-posyandu', [PosyanduController::class, 'editPosyandu'])->middleware('auth', 'CekRole:1');
Route::post('/edit-balita', [BalitaController::class, 'editBalita'])->middleware('auth', 'CekRole:1,2,3');
Route::post('/edit-history', [HistoryController::class, 'editHistory'])->middleware('auth', 'CekRole:1,2');
Route::post('/edit-userrole', [UserRoleController::class, 'editUserRole']);
Route::post('/edit-user', [UserController::class, 'editUser'])->middleware('auth', 'CekRole:1');


//Update
Route::put('/update-kecamatan{id}', [KecamatanController::class, 'update'])->middleware('auth', 'CekRole:1');
Route::put('/update-kelurahan{id}', [KelurahanController::class, 'update'])->middleware('auth', 'CekRole:1');
Route::put('/update-posyandu', [PosyanduController::class, 'update'])->middleware('auth', 'CekRole:1');
Route::put('/update-balita', [BalitaController::class, 'update']);
Route::put('/update-history', [HistoryController::class, 'update'])->middleware('auth', 'CekRole:1,2');
Route::put('/update-userrole', [UserRoleController::class, 'update'])->middleware('auth', 'CekRole:1');
Route::put('/update-user', [UserController::class, 'update'])->middleware('auth', 'CekRole:1');

//Delete
Route::get('/hapus-kecamatan{id}', [KecamatanController::class, 'delete'])->middleware('auth', 'CekRole:1');
Route::get('/hapus-kelurahan{id}', [KelurahanController::class, 'delete'])->middleware('auth', 'CekRole:1');
Route::get('/hapus-posyandu{id}', [PosyanduController::class, 'delete'])->middleware('auth', 'CekRole:1');
Route::get('/hapus-balita{id}', [BalitaController::class, 'delete'])->middleware('auth', 'CekRole:1,2');
Route::get('/hapus-history{id}', [HistoryController::class, 'delete'])->middleware('auth', 'CekRole:1,2');
Route::get('/hapus-userrole{id}', [UserRoleController::class, 'delete'])->middleware('auth', 'CekRole:1');

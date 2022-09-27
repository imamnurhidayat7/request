<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestController;

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

Route::get('/', [DataController::class, 'home']);
Route::get('/keycloak/redirect', [AuthController::class, 'redirect']);
Route::get('/keycloak/redirect-logout', [AuthController::class, 'redirectLogout']);
Route::post('signin', [AuthController::class, 'login']);
Route::get('signout', [AuthController::class, 'keluar']);
Route::get('login', [AuthController::class, 'showLoginPage'])->name('login');
Route::get('layanan/{id}', [DataController::class, 'showDetailLayanan']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('checkRole:admin');
    Route::get('admin/request', [AdminController::class, 'showRequestList'])->middleware('checkRole:admin');
    Route::get('admin/request/detail/{id}', [AdminController::class, 'requestDetail'])->middleware('checkRole:admin');
    Route::post('admin/request/update', [AdminController::class, 'updateRequest'])->middleware('checkRole:admin');
    Route::get('admin/layanan', [AdminController::class, 'layanan'])->middleware('checkRole:admin');
    Route::get('admin/layanan/tambah', [AdminController::class, 'formLayanan'])->middleware('checkRole:admin');
    Route::get('admin/layanan/edit/{id}', [AdminController::class, 'editLayanan'])->middleware('checkRole:admin');
    Route::post('tambah-layanan', [AdminController::class, 'tambahLayanan'])->middleware('checkRole:admin');
    Route::post('update-layanan', [AdminController::class, 'updateLayanan'])->middleware('checkRole:admin');
    // Route::post('delete-layanan', [AdminController::class, 'updateLayanan']);
    Route::post('upload-image', [AdminController::class, 'uploadImage'])->name('upload.image');
    Route::get('admin/approver', [AdminController::class, 'approver'])->middleware('checkRole:admin');
    Route::post('tambah-approver', [AdminController::class, 'tambahApprover'])->middleware('checkRole:admin');
    Route::post('admin/input-data-approver', [AdminController::class, 'inputApprover'])->middleware('checkRole:admin');
    Route::post('admin/update-data-approver', [AdminController::class, 'updateApprover'])->middleware('checkRole:admin');
    Route::post('admin/delete-data-approver', [AdminController::class, 'deleteApprover'])->middleware('checkRole:admin');

    //request
    Route::get('layanan/request/{id}', [RequestController::class, 'requestLayanan']);
    Route::post('tambah-request', [RequestController::class, 'addRequest']);
    Route::post('update-request', [RequestController::class, 'updateRequest']);
    Route::get('my-request', [RequestController::class, 'showMyRequest']);
    Route::get('my-request/detail/{id}', [RequestController::class, 'detailRequest']);
});


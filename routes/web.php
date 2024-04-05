<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [Usercontroller::class, 'index']);
Route::get('/user/tambah', [Usercontroller::class, 'tambah']);
Route::post('/user/tambah_simpan', [Usercontroller::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [Usercontroller::class, 'ubah']);
Route::put('/user/ubah_simpan{id}', [Usercontroller::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [Usercontroller::class, 'hapus']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::resource('/m_user', POSController::class);

Route::get('/kategori/edit/{id}',[KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/delete/{id}',[KategoriController::class, 'delete'])->name('kategori.delete');
Route::get('/kategori/create',[KategoriController::class, 'create'])->name('kategori.create');
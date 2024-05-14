<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UploadFileController;

// Route::get('/', function () {
//     // return view('welcome');
//     // JS 6 A bagian 3
//     // return view('welcomejs6');
//     // JS 6 A bagian 7
//     return view('welcomejs6a');
// });

// JS 7 Praktikum 2 bagian 5
Route::get('/', [WelcomeController::class, 'index']);

// JS 6 D bagian 2
Route::resource('m_user', POSController::class);

// // Jobsheet 3 Praktikum 4 bagian 2
// Route::get('/level', [LevelController::class, 'index']) ->name('level');
// // JS 6 A bagian 9
// Route::get('/level/tambah', [LevelController::class, 'create']) ->name('level.create');
// Route::post('/level', [LevelController::class, 'store']) ->name('level.store');
// Route::get('/level/edit/{id}', [LevelController::class, 'edit']) ->name('level.edit');
// Route::put('/level/update/{id}', [LevelController::class, 'update']) ->name('level.update');
// Route::get('/level/delete/{id}', [LevelController::class, 'delete']) ->name('level.delete');


// // Jobsheet 3 Praktikum 5 bagian 2
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
// // Jobsheet 5 praktikum 2 bagian 1
// Route::get('/kategori/tambah',[KategoriController::class, 'create'])->name('kategori.create');
// Route::post('/kategori',[KategoriController::class, 'store'])->name('kategori.store');
// Route::get('/kategori/edit/{id}',[KategoriController::class, 'edit'])->name('kategori.edit');
// Route::put('/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori.update');
// Route::get('/kategori/delete/{id}',[KategoriController::class, 'delete'])->name('kategori.delete');

// // Jobsheet 3 Praktikum 6 bagian 4
// Route::get('/user', [UserController::class, 'index'])->name('user');
// // jobsheet 4 praktikum 2.6 bagian 1
// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');
// // Jobsheet 4 praktikum 2.6 bagian 9
// Route::post('user/tambah_simpan',[UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');
// // Jobsheet 4 praktikum 2.6 bagian 15
// Route::put('user/ubah_simpan/{id}',[UserController::class, 'ubah_simpan'])->name('user.ubah_simpan');

// JS 7 Praktikum 3 bagian 3
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);                                // Menampilkan data user
    Route::post('/list', [UserController::class, 'list']);                       // menampilkan data user dalam bentukjson untuk datatables
    Route::get('/create', [UserController::class, 'create']);                  // menampilkan form tambah user
    Route::post('/', [UserController::class, 'store']);                         // menyimpan data user
    Route::get('/{id}', [UserController::class, 'show']);                        // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);                   // menampilkan form edit user
    Route::put('/{id}', [UserController::class, 'update']);                    // mengupdate data user
    Route::delete('/{id}', [UserController::class, 'destroy']);               // menghapus data user
});

Route::group(['prefix' => 'level'],function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'],function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});


Route::group(['prefix' => 'barang'],function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});


Route::group(['prefix' => 'stok'],function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

Route::group(['prefix' => 'transaksi'],function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('/list', [TransaksiController::class, 'list']);
    Route::get('/create', [TransaksiController::class, 'create']);
    Route::post('/', [TransaksiController::class, 'store']);
    Route::get('/{id}', [TransaksiController::class, 'show']);
    Route::get('/{id}/edit', [TransaksiController::class, 'edit']);
    Route::put('/{id}', [TransaksiController::class, 'update']);
    Route::delete('/{id}', [TransaksiController::class, 'destroy']);
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan manager maka akan diarahkan ke ManagerController
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cek_login:1'], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => 'cek_login:2'], function () {
        Route::resource('manager', ManagerController::class);
    });
});

Route::get('/', function (){
    return view('welcome');
});
Route::get('/file-upload', [FileUploadController::class,'uploadfile']);
Route::post('/file-upload', [FileUploadController::class, 'prosesfileUpload']);

Route::get('/upload-file', [UploadFileController::class,'uploadfile']);
Route::post('/upload-file', [UploadFileController::class, 'prosesfileUpload']);
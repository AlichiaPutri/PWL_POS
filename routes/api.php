<!-- <?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransaksiController as ApiTransaksiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

// Pengerjaan Jobsheet 10 praktikum 3 bagian 4
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

// Pengerjaan Jobsheet 10 praktikum 4 bagian 3
Route::get("levels",[LevelController::class,'index']);
Route::post("levels",[LevelController::class,'store']);
Route::get("levels/{level}",[LevelController::class,'show']);
Route::put("levels/{level}",[LevelController::class,'update']);
Route::delete("levels/{level}",[LevelController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// API User
Route::get('users' , [UserController::class,'index']);
Route::post('users' , [UserController::class,'store']);
Route::get('users/{user}', [UserController::class,'show']);
Route::put("users/{user}",[UserController::class,'update']);
Route::delete("users/{user}",[UserController::class,'destroy']);

// API Kategori
Route::get('kategoris' , [KategoriController::class,'index']);
Route::post('kategoris' , [KategoriController::class,'store']);
Route::get('kategoris/{kategori}', [KategoriController::class,'show']);
Route::put("kategoris/{kategori}",[KategoriController::class,'update']);
Route::delete("kategoris/{kategori}",[KategoriController::class,'destroy']);

Route::get('/transaksi', [ApiTransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi/{penjualan}', [TransaksiController::class, 'show']);
Route::put('/penjualans/{penjualan}', [TransaksiController::class, 'update']);
Route::delete('/penjualans/{penjualan}', [TransaksiController::class, 'destroy']);

// API Barang
Route::get('barangs' , [BarangController::class,'index']);
Route::post('barangs' , [BarangController::class,'store']);
Route::get('barangs/{barang}', [BarangController::class,'show']);
Route::put("barangs/{barang}",[BarangController::class,'update']);
Route::delete("barangs/{barang}",[BarangController::class,'destroy']);

Route::post('/register1',RegisterController::class)->name('register1');
// Route::post('/barang1', App\Http\Controllers\Api\BarangController::class)->name('barang1');
// Route::post('/barang', BarangController::class);->name('barang1');
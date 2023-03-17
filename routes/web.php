<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokumentController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KgbController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RiwayatPendidikanController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
   Alert::alert('Title', 'Message', 'Type');
    return view('welcome');
});

Route::get('/login/simpeg/', [LoginController::class, 'login'])->name('login');
Route::post('/login/proses', [LoginController::class, 'store']);

Route::get('/register', [LoginController::class, 'regis']);
Route::post('/register/proses', [LoginController::class, 'regis_proses']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        Route::get('/pegawai/index', [PegawaiController::class, 'index'])->name('pegawaiindex');
        Route::get('/pegawai/tampil', [PegawaiController::class, 'tampil'])->name('pegawaitampil');
        Route::get('/pegawai/create', [PegawaiController::class, 'create']);
        Route::post('/pegawaistore', [PegawaiController::class, 'store']);
        Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
        Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
        Route::get('/pegawai/tampil/{id}', [PegawaiController::class, 'show'])->name('pegawai.detail');
        Route::post('pegawaidestroy', [PegawaiController::class, 'destroy'])->name('pegawai.delete');
        Route::get('/pegawai/pdf', [PegawaiController::class, 'cetak_pdf']);
        Route::get('/berkas/edit/{id}', [PegawaiController::class, 'berkas']);
        Route::post('/berkas/update/{id}', [PegawaiController::class, 'berkasupdate']);
        Route::get('/changestatus', [PegawaiController::class, 'changestatus']);
        Route::get('/delete/berkas/{id}', [PegawaiController::class, 'delete'])->name('berkas.delete');
        Route::get('/pegawai/pdf/{id}', [PegawaiController::class, 'detailpdf']);

        Route::get('/pendidikan/index/', [RiwayatPendidikanController::class, 'index'])->name('pendidikanindex');
        Route::get('/pendidikan/tampil/', [RiwayatPendidikanController::class, 'tampil'])->name('pendidikantampil');
        Route::get('/pendidikan/create', [RiwayatPendidikanController::class, 'create'])->name('pedidikancreate');
        Route::post('/pendidikan/store', [RiwayatPendidikanController::class, 'store']);
        Route::get('/pendidikan/edit/{id}', [RiwayatPendidikanController::class, 'edit'])->name('pendidikanedit');
        Route::post('/pendidikan/update/{id}', [RiwayatPendidikanController::class, 'update']);
        Route::post('pendidikandestroy', [RiwayatPendidikanController::class, 'destroy'])->name('delete.Pendidikan');

        Route::get('/instansi/index', [InstansiController::class, 'index'])->name('instansiindex');
        Route::get('/instansi/tampil', [InstansiController::class, 'tampil'])->name('instansitampil');
        Route::get('/instansi/create', [InstansiController::class, 'create']);
        Route::post('/instansi/store', [InstansiController::class, 'store']);
        Route::get('/instansi/edit/{id}', [InstansiController::class, 'edit']);
        Route::post('/instansi/update/{id}', [InstansiController::class, 'update']);
        Route::get('/instansi/tampil/{id}', [InstansiController::class, 'show']);
        Route::post('InstansiDelete', [InstansiController::class, 'hapus'])->name('instansi.delete');
        Route::get('/instansi/pdf', [InstansiController::class, 'cetak_pdf']);

        Route::get('/kgb/index/', [KgbController::class, 'index'])->name('kgbindex');
        Route::get('/kgb/create', [KgbController::class, 'create']);
        Route::post('/kgb/store', [KgbController::class, 'store']);

        Route::get('/dokument/index/', [DokumentController::class, 'index'])->name('dokumentindex');
        Route::get('/dokument/tampil/', [DokumentController::class, 'tampil'])->name('dokumentampil');
        Route::get('/dokument/create/', [DokumentController::class, 'create'])->name('dokumentcreate');
        Route::post('/dokument/store/', [DokumentController::class, 'store']);
        Route::post('/dokument/destroy', [DokumentController::class, 'destroy'])->name('berkas.delete');
        Route::get('/dokument/edit/{id}', [DokumentController::class, 'edit']);
        Route::post('/dokument/update/{id}', [DokumentController::class, 'update']);

        Route::get('/jabatan/index/', [JabatanController::class, 'index'])->name('jabatanindex');
        Route::get('/jabatan/tampil/', [JabatanController::class, 'tampil'])->name('jabatantampil');
        Route::get('/jabatan/create/', [JabatanController::class, 'create']);
        Route::post('/jabatan/store/', [JabatanController::class, 'store']);
        Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit']);
        Route::post('/jabatan/update/{id}', [JabatanController::class, 'update']);
        Route::get('/jabatan/detail/{id}', [JabatanController::class, 'detail']);
        Route::post('data.hapus', [JabatanController::class, 'hapus'])->name('hapus');

        Route::get('/export/excel', [ExcelController::class, 'export_excel']);
        Route::get('/export/view', [ExcelController::class, 'export_view']);
        Route::get('/export/pegawai', [ExcelController::class, 'pegawai_excel']);
        Route::get('/export/pegawai', [ExcelController::class, 'store_excel']);

        Route::get('/logout', [LoginController::class, 'logout']);
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\PerihalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[LoginController::class,'register']);
Route::post('/simpan',[LoginController::class,'simpan']);
Route::post('/post-login',[LoginController::class,'postLogin'])->name('Post-Login');
Route::get('/logout',[LoginController::class,'logout']);

Route::middleware(['auth'])->group(function () {

Route::get('/',[LoginController::class,'jumlah']);
Route::get('/data-permohonan-surat-masuk',[LoginController::class,'singlep']);

    // Surat Masuk
Route::get('/data-surat-masuk',[SuratMasukController::class,'SuratMasuk']);
Route::get('/tambah-surat-masuk',[SuratMasukController::class,'TambahSuratMasuk']);
Route::post('/simpan-surat-masuk',[SuratMasukController::class,'SimpanSuratMasuk']);
Route::get('/edit-surat-masuk/{id}',[SuratMasukController::class,'EditSuratMasuk']);
Route::post('/perubahan-surat-masuk/{id}',[SuratMasukController::class,'PerubahanSuratMasuk']);
Route::get('/hapus-surat-masuk/{id}',[SuratMasukController::class,'HapusSuratMasuk']);
Route::get('/cetak-surat-masuk',[SuratMasukController::class,'CetakSuratMasuk']);
Route::get('/cetak-surat-masuk/{tanggal_awal}/{tanggal_akhir}',[SuratMasukController::class,'Cetak']);
// Surat Keluar
Route::get('/data-surat-keluar',[SuratKeluarController::class,'SuratKeluar']);
Route::get('/tambah-surat-keluar',[SuratKeluarController::class,'TambahSuratKeluar']);
Route::post('/simpan-surat-keluar',[SuratKeluarController::class,'SimpanSuratKeluar']);
Route::get('/edit-surat-keluar/{id}',[SuratKeluarController::class,'EditSuratKeluar']);
Route::post('/perubahan-surat-keluar/{id}',[SuratKeluarController::class,'PerubahanSuratKeluar']);
Route::get('/hapus-surat-keluar/{id}',[SuratKeluarController::class,'HapusSuratKeluar']);
Route::get('/cetak-surat-keluar',[SuratKeluarController::class,'CetakSuratKeluar']);
Route::get('/cetak-surat-keluar/{tanggal_awal}/{tanggal_akhir}',[SuratKeluarController::class,'Cetak']);
// Perihal
Route::get('/data-perihal',[PerihalController::class,'Perihal']);
Route::get('/tambah-perihal',[PerihalController::class,'TambahPerihal']);
Route::post('/simpan-perihal',[PerihalController::class,'SimpanPerihal']);
Route::get('/edit-perihal/{id}',[PerihalController::class,'EditPerihal']);
Route::post('/perubahan-perihal/{id}',[PerihalController::class,'PerubahanPerihal']);
Route::get('/hapus-perihal/{id}',[PerihalController::class,'HapusPerihal']);
//jabatan 
Route::get('/data-jabatan',[JabatanController::class,'Jabatan']);
Route::post('/simpan-jabatan',[JabatanController::class,'SimpanJabatan']);
Route::get('/edit-jabatan/{id}',[JabatanController::class,'EditJabatan']);
Route::post('/perubahan-jabatan/{id}',[JabatanController::class,'PerubahanJabatan']);
Route::get('/hapus-jabatan/{id}',[JabatanController::class,'HapusJabatan']);
//pegawai
Route::get('/data-pegawai',[PegawaiController::class,'Pegawai']);
Route::get('/tambah-pegawai',[PegawaiController::class,'TambahPegawai']);
Route::post('/simpan-pegawai',[PegawaiController::class,'SimpanPegawai']);
Route::get('/edit-pegawai/{id}',[PegawaiController::class,'EditPegawai']);
Route::post('/perubahan-pegawai/{id}',[PegawaiController::class,'PerubahanPegawai']);
Route::get('/hapus-pegawai/{id}',[PegawaiController::class,'HapusPegawai']);
});
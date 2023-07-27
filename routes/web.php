<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\Transaksi;

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
Route::get('/', [Home::class, 'index'])->name('home');

Route::get('kategori', [Kategori::class, 'index'])->name('kategori');
Route::get('tambah_kategori', [Kategori::class, 'action_kategori'])->name('tambah_kategori');
Route::post('action_tambah_kategori', [Kategori::class, 'action_tambah_kategori'])->name('action_tambah_kategori');
Route::get('edit_kategori/{id}', [Kategori::class, 'action_kategori'])->name('edit_kategori');
Route::post('action_edit_kategori}', [Kategori::class, 'action_edit_kategori'])->name('action_edit_kategori');
Route::post('action_del_kategori}', [Kategori::class, 'action_del_kategori'])->name('action_del_kategori');

Route::get('transaksi', [Transaksi::class, 'index'])->name('transaksi');
Route::get('tambah_transaksi', [Transaksi::class, 'action_transaksi'])->name('tambah_transaksi');
Route::post('action_tambah_transaksi', [Transaksi::class, 'action_tambah_transaksi'])->name('action_tambah_transaksi');
Route::get('edit_transaksi/{id}', [Transaksi::class, 'action_transaksi'])->name('edit_transaksi');
Route::post('action_edit_transaksi}', [Transaksi::class, 'action_edit_transaksi'])->name('action_edit_transaksi');
Route::post('action_del_transaksi}', [Transaksi::class, 'action_del_transaksi'])->name('action_del_transaksi');

Route::post('data_kategori', [Transaksi::class, 'data_kategori'])->name('data_kategori');
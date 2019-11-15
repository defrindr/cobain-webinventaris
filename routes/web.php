<?php

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

use App\Http\Controllers\Auth\LoginController;

Route::redirect('/', '/admin-login');

Route::get('/admin-login', 
        '\App\Http\Controllers\LoginController@index')
        ->name('auth.formLogin');
Route::post('/admin-login', 
        '\App\Http\Controllers\LoginController@login')
        ->name('auth.login');
Route::post('/admin-logout', 
        '\App\Http\Controllers\LoginController@logout')
        ->name('auth.logout');






Route::group(['middleware' => ['Admin']], function () {
    /**
     * ! Jenis
     */
    Route::get(
        '/jenis',
        '\App\Http\Controllers\JenisController@index'
    )
        ->name('jenis.index');
    Route::get(
        '/jenis/create',
        '\App\Http\Controllers\JenisController@create'
    )
        ->name('jenis.create');
    Route::post(
        '/jenis/create',
        '\App\Http\Controllers\JenisController@store'
    )
        ->name('jenis.store');
    Route::get(
        '/jenis/edit/{id}',
        '\App\Http\Controllers\JenisController@edit'
    )
        ->name('jenis.edit');
    Route::put(
        '/jenis/edit/{id}',
        '\App\Http\Controllers\JenisController@update'
    )
        ->name('jenis.update');
    Route::delete(
        '/jenis/{id}',
        '\App\Http\Controllers\JenisController@delete'
    )
        ->name('jenis.delete');


    /**
     * ! Pegawai
     */
    Route::get(
        '/pegawai',
        '\App\Http\Controllers\PegawaiController@index'
    )
        ->name('pegawai.index');
    Route::get(
        '/pegawai/create',
        '\App\Http\Controllers\PegawaiController@create'
    )
        ->name('pegawai.create');
    Route::post(
        '/pegawai/create',
        '\App\Http\Controllers\PegawaiController@store'
    )
        ->name('pegawai.store');
    Route::get(
        '/pegawai/edit/{id}',
        '\App\Http\Controllers\PegawaiController@edit'
    )
        ->name('pegawai.edit');
    Route::put(
        '/pegawai/edit/{id}',
        '\App\Http\Controllers\PegawaiController@update'
    )
        ->name('pegawai.update');
    Route::delete(
        '/pegawai/{id}',
        '\App\Http\Controllers\PegawaiController@delete'
    )
        ->name('pegawai.delete');

    /**
     * ! Level
     */
    Route::get(
        '/level',
        '\App\Http\Controllers\LevelController@index'
    )
        ->name('level.index');
    Route::get(
        '/level/create',
        '\App\Http\Controllers\LevelController@create'
    )
        ->name('level.create');
    Route::post(
        '/level/create',
        '\App\Http\Controllers\LevelController@store'
    )
        ->name('level.store');
    Route::get(
        '/level/edit/{id}',
        '\App\Http\Controllers\LevelController@edit'
    )
        ->name('level.edit');
    Route::put(
        '/level/edit/{id}',
        '\App\Http\Controllers\LevelController@update'
    )
        ->name('level.update');
    Route::delete(
        '/level/{id}',
        '\App\Http\Controllers\LevelController@delete'
    )
        ->name('level.delete');



    /**
     * ! Ruang
     */
    Route::get(
        '/ruang',
        '\App\Http\Controllers\RuangController@index'
    )
        ->name('ruang.index');
    Route::get(
        '/ruang/create',
        '\App\Http\Controllers\RuangController@create'
    )
        ->name('ruang.create');
    Route::post(
        '/ruang/create',
        '\App\Http\Controllers\RuangController@store'
    )
        ->name('ruang.store');
    Route::get(
        '/ruang/edit/{id}',
        '\App\Http\Controllers\RuangController@edit'
    )
        ->name('ruang.edit');
    Route::put(
        '/ruang/edit/{id}',
        '\App\Http\Controllers\RuangController@update'
    )
        ->name('ruang.update');
    Route::delete(
        '/ruang/{id}',
        '\App\Http\Controllers\RuangController@delete'
    )
        ->name('ruang.delete');


    /**
     * ! Petugas
     */
    Route::get(
        '/petugas',
        '\App\Http\Controllers\PetugasController@index'
    )
        ->name('petugas.index');
    Route::get(
        '/petugas/create',
        '\App\Http\Controllers\PetugasController@create'
    )
        ->name('petugas.create');
    Route::post(
        '/petugas/create',
        '\App\Http\Controllers\PetugasController@store'
    )
        ->name('petugas.store');
    Route::get(
        '/petugas/edit/{id}',
        '\App\Http\Controllers\PetugasController@edit'
    )
        ->name('petugas.edit');
    Route::put(
        '/petugas/edit/{id}',
        '\App\Http\Controllers\PetugasController@update'
    )
        ->name('petugas.update');
    Route::delete(
        '/petugas/{id}',
        '\App\Http\Controllers\PetugasController@delete'
    )
        ->name('petugas.delete');



    /**
     * ! Inventaris
     */
    Route::get(
        '/inventaris',
        '\App\Http\Controllers\InventarisController@index'
    )
        ->name('inventaris.index');
    Route::get(
        '/inventaris/create',
        '\App\Http\Controllers\InventarisController@create'
    )
        ->name('inventaris.create');
    Route::post(
        '/inventaris/create',
        '\App\Http\Controllers\InventarisController@store'
    )
        ->name('inventaris.store');
    Route::get(
        '/inventaris/edit/{id}',
        '\App\Http\Controllers\InventarisController@edit'
    )
        ->name('inventaris.edit');
    Route::put(
        '/inventaris/edit/{id}',
        '\App\Http\Controllers\InventarisController@update'
    )
        ->name('inventaris.update');
    Route::delete(
        '/inventaris/{id}',
        '\App\Http\Controllers\InventarisController@delete'
    )
        ->name('inventaris.delete');


});
// * End Admin Middleware Routes


Route::group(['middleware' => ['Operator']], function () {
    Route::get(
        '/peminjaman/kembali/{id}',
        '\App\Http\Controllers\PeminjamanController@kembali'
    )
        ->name('peminjaman.kembali');
    Route::get(
        '/peminjaman/edit/{id}',
        '\App\Http\Controllers\PeminjamanController@edit'
    )
        ->name('peminjaman.edit');
    Route::put(
        '/peminjaman/edit/{id}',
        '\App\Http\Controllers\PeminjamanController@update'
    )
        ->name('peminjaman.update');
});
// * End Operator Middleware Routes


Route::group(['middleware' => ['Peminjam']], function () {

    /**
     * ! Peminjaman
     */
    Route::get(
        '/peminjaman',
        '\App\Http\Controllers\PeminjamanController@index'
    )
        ->name('peminjaman.index');
    Route::get(
        '/peminjaman/history',
        '\App\Http\Controllers\PeminjamanController@history'
    )
        ->name('peminjaman.history');

    Route::get(
        '/peminjaman/show-history/{id}',
        '\App\Http\Controllers\PeminjamanController@showHistory'
    )
        ->name('peminjaman.showHistory');
    Route::get(
        '/peminjaman/create',
        '\App\Http\Controllers\PeminjamanController@create'
    )
        ->name('peminjaman.create');
    Route::post(
        '/peminjaman/create',
        '\App\Http\Controllers\PeminjamanController@store'
    )
        ->name('peminjaman.store');
    Route::get(
        '/peminjaman/show/{id}',
        '\App\Http\Controllers\PeminjamanController@show'
    )
        ->name('peminjaman.show');
    Route::delete(
        '/peminjaman/{id}',
        '\App\Http\Controllers\PeminjamanController@delete'
    )
        ->name('peminjaman.delete');

        /**
         * ! Detail Pinjam
         */
    // Route::get(
    //     '/detail-pinjam',
    //     '\App\Http\Controllers\DetailPinjamController@index'
    // )
        // ->name('detailPinjam.index');
    Route::get(
        '/detail-pinjam/create/{id}',
        '\App\Http\Controllers\DetailPinjamController@create'
    )
        ->name('detailPinjam.create');
    Route::post(
        '/detail-pinjam/create',
        '\App\Http\Controllers\DetailPinjamController@store'
    )
        ->name('detailPinjam.store');
    Route::get(
        '/detail-pinjam/edit/{id}',
        '\App\Http\Controllers\DetailPinjamController@edit'
    )
        ->name('detailPinjam.edit');
    Route::put(
        '/detail-pinjam/edit/{id}',
        '\App\Http\Controllers\DetailPinjamController@update'
    )
        ->name('detailPinjam.update');
    Route::delete(
        '/detail-pinjam/{id}',
        '\App\Http\Controllers\DetailPinjamController@delete'
    )
        ->name('detailPinjam.delete');

});
// * End Peminjam Middleware Routes
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
        ->middleware('isAlreadyLogin')
        ->name('auth.formLogin');
Route::post('/admin-login', 
        '\App\Http\Controllers\LoginController@login')
        ->middleware('isAlreadyLogin')
        ->name('auth.login');
Route::post('/admin-logout', 
        '\App\Http\Controllers\LoginController@logout')
        ->middleware('Role:Administrator-Operator-Peminjam')
        ->name('auth.logout');

Route::get('/report','ReportController@index')->name('report.index');
Route::get('/DownloadLaporanP','ReportController@downloadReportPeminjaman')->name('report.peminjaman');
Route::get('/DownloadLaporanI','ReportController@downloadReportInventaris')->name('report.inventaris');
Route::get('/DownloadLaporanJ','ReportController@downloadReportJenis')->name('report.jenis');
Route::get('/DownloadLaporanR','ReportController@downloadReportRuang')->name('report.ruang');





// Route::group(['middleware' => ['Role:Administrator']], function () {
    /**
     * ! Jenis
     */
    Route::get(
        '/jenis',
        '\App\Http\Controllers\JenisController@index'
    )->middleware('Role:Administrator')
        ->name('jenis.index');
    Route::get(
        '/jenis/create',
        '\App\Http\Controllers\JenisController@create'
    )->middleware('Role:Administrator')
        ->name('jenis.create');
    Route::post(
        '/jenis/create',
        '\App\Http\Controllers\JenisController@store'
    )->middleware('Role:Administrator')
        ->name('jenis.store');
    Route::get(
        '/jenis/edit/{id}',
        '\App\Http\Controllers\JenisController@edit'
    )->middleware('Role:Administrator')
        ->name('jenis.edit');
    Route::put(
        '/jenis/edit/{id}',
        '\App\Http\Controllers\JenisController@update'
    )->middleware('Role:Administrator')
        ->name('jenis.update');
    Route::delete(
        '/jenis/{id}',
        '\App\Http\Controllers\JenisController@delete'
    )->middleware('Role:Administrator')
        ->name('jenis.delete');


    /**
     * ! Pegawai
     */
    Route::get(
        '/pegawai',
        '\App\Http\Controllers\PegawaiController@index'
    )->middleware('Role:Administrator-Operator')
        ->name('pegawai.index');
    Route::get(
        '/pegawai/create',
        '\App\Http\Controllers\PegawaiController@create'
    )->middleware('Role:Administrator-Operator')
        ->name('pegawai.create');
    Route::post(
        '/pegawai/create',
        '\App\Http\Controllers\PegawaiController@store'
    )->middleware('Role:Administrator-Operator')
        ->name('pegawai.store');
    Route::get(
        '/pegawai/edit/{id}',
        '\App\Http\Controllers\PegawaiController@edit'
    )->middleware('Role:Administrator-Peminjam')
        ->name('pegawai.edit');
    Route::put(
        '/pegawai/edit/{id}',
        '\App\Http\Controllers\PegawaiController@update'
    )->middleware('Role:Administrator-Peminjam')
        ->name('pegawai.update');
    Route::delete(
        '/pegawai/{id}',
        '\App\Http\Controllers\PegawaiController@delete'
    )->middleware('Role:Administrator')
        ->name('pegawai.delete');
    Route::post(
        '/pegawai/switch/{id}',
        '\App\Http\Controllers\PegawaiController@switchStatusAccount'
    )->middleware('Role:Administrator')
        ->name('pegawai.switch');

    /**
     * ! Level
     */
    Route::get(
        '/level',
        '\App\Http\Controllers\LevelController@index'
    )->middleware('Role:Administrator')
        ->name('level.index');
    Route::get(
        '/level/create',
        '\App\Http\Controllers\LevelController@create'
    )->middleware('Role:Administrator')
        ->name('level.create');
    Route::post(
        '/level/create',
        '\App\Http\Controllers\LevelController@store'
    )->middleware('Role:Administrator')
        ->name('level.store');
    Route::get(
        '/level/edit/{id}',
        '\App\Http\Controllers\LevelController@edit'
    )->middleware('Role:Administrator')
        ->name('level.edit');
    Route::put(
        '/level/edit/{id}',
        '\App\Http\Controllers\LevelController@update'
    )->middleware('Role:Administrator')
        ->name('level.update');
    Route::delete(
        '/level/{id}',
        '\App\Http\Controllers\LevelController@delete'
    )->middleware('Role:Administrator')
        ->name('level.delete');



    /**
     * ! Ruang
     */
    Route::get(
        '/ruang',
        '\App\Http\Controllers\RuangController@index'
    )->middleware('Role:Administrator')
        ->name('ruang.index');
    Route::get(
        '/ruang/create',
        '\App\Http\Controllers\RuangController@create'
    )->middleware('Role:Administrator')
        ->name('ruang.create');
    Route::post(
        '/ruang/create',
        '\App\Http\Controllers\RuangController@store'
    )->middleware('Role:Administrator')
        ->name('ruang.store');
    Route::get(
        '/ruang/edit/{id}',
        '\App\Http\Controllers\RuangController@edit'
    )->middleware('Role:Administrator')
        ->name('ruang.edit');
    Route::put(
        '/ruang/edit/{id}',
        '\App\Http\Controllers\RuangController@update'
    )->middleware('Role:Administrator')
        ->name('ruang.update');
    Route::delete(
        '/ruang/{id}',
        '\App\Http\Controllers\RuangController@delete'
    )->middleware('Role:Administrator')
        ->name('ruang.delete');


    /**
     * ! Petugas
     */
    Route::get(
        '/petugas',
        '\App\Http\Controllers\PetugasController@index'
    )->middleware('Role:Administrator')
        ->name('petugas.index');
    Route::get(
        '/petugas/create',
        '\App\Http\Controllers\PetugasController@create'
    )->middleware('Role:Administrator')
        ->name('petugas.create');
    Route::post(
        '/petugas/create',
        '\App\Http\Controllers\PetugasController@store'
    )->middleware('Role:Administrator')
        ->name('petugas.store');
    Route::get(
        '/petugas/edit/{id}',
        '\App\Http\Controllers\PetugasController@edit'
    )->middleware('Role:Administrator')
        ->name('petugas.edit');
    Route::put(
        '/petugas/edit/{id}',
        '\App\Http\Controllers\PetugasController@update'
    )->middleware('Role:Administrator')
        ->name('petugas.update');
    Route::delete(
        '/petugas/{id}',
        '\App\Http\Controllers\PetugasController@delete'
    )->middleware('Role:Administrator')
        ->name('petugas.delete');



    /**
     * ! Inventaris
     */
    Route::get(
        '/inventaris',
        '\App\Http\Controllers\InventarisController@index'
    )->middleware('Role:Administrator')
        ->name('inventaris.index');
    Route::get(
        '/inventaris/create',
        '\App\Http\Controllers\InventarisController@create'
    )->middleware('Role:Administrator')
        ->name('inventaris.create');
    Route::post(
        '/inventaris/create',
        '\App\Http\Controllers\InventarisController@store'
    )->middleware('Role:Administrator')
        ->name('inventaris.store');
    Route::get(
        '/inventaris/edit/{id}',
        '\App\Http\Controllers\InventarisController@edit'
    )->middleware('Role:Administrator')
        ->name('inventaris.edit');
    Route::put(
        '/inventaris/edit/{id}',
        '\App\Http\Controllers\InventarisController@update'
    )->middleware('Role:Administrator')
        ->name('inventaris.update');
    Route::delete(
        '/inventaris/{id}',
        '\App\Http\Controllers\InventarisController@delete'
    )->middleware('Role:Administrator')
        ->name('inventaris.delete');
// });
// * End Admin Middleware Routes


// Route::group(['middleware' => ['Role:Operator-Administrator']], function () {
    Route::get(
        '/peminjaman/kembali/{id}',
        '\App\Http\Controllers\PeminjamanController@kembali'
    )->middleware('Role:Operator-Administrator')
        ->name('peminjaman.kembali');
    Route::get(
        '/peminjaman/acc-pinjam/{id}',
        '\App\Http\Controllers\PeminjamanController@acceptPinjam'
    )->middleware('Role:Operator-Administrator')
        ->name('peminjaman.acceptPinjam');
    // Route::get(
    //     '/peminjaman/edit/{id}',
    //     '\App\Http\Controllers\PeminjamanController@edit'
    // )
        // ->name('peminjaman.edit');
    Route::put(
        '/peminjaman/edit/{id}',
        '\App\Http\Controllers\PeminjamanController@update'
    )->middleware('Role:Peminjam')
        ->name('peminjaman.update');
// });
// * End Operator Middleware Routes


// Route::group(['middleware' => ['Role:Peminjam']], function () {

    /**
     * ! Peminjaman
     */
    Route::get(
        '/peminjaman/req-kembali/{id}',
        '\App\Http\Controllers\PeminjamanController@requestKembali'
    )->middleware('Role:Peminjam')
        ->name('peminjaman.requestKembali');

    Route::get(
        '/peminjaman',
        '\App\Http\Controllers\PeminjamanController@index'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.index');

    Route::get(
        '/peminjaman/history',
        '\App\Http\Controllers\PeminjamanController@IndexHistory'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.history');
    Route::get(
        '/peminjaman/index-acc-pinjam',
        '\App\Http\Controllers\PeminjamanController@IndexAcceptPinjam'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.pinjam');
    Route::get(
        '/peminjaman/req-kembali',
        '\App\Http\Controllers\PeminjamanController@IndexRequestKembali'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.reqKembali');




    Route::get(
        '/peminjaman/show-history/{id}',
        '\App\Http\Controllers\PeminjamanController@showHistory'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.showHistory');
    Route::get(
        '/peminjaman/create',
        '\App\Http\Controllers\PeminjamanController@create'
    )->middleware('Role:Peminjam')
        ->name('peminjaman.create');
    Route::post(
        '/peminjaman/create',
        '\App\Http\Controllers\PeminjamanController@store'
    )->middleware('Role:Peminjam')
        ->name('peminjaman.store');
    Route::get(
        '/peminjaman/show/{id}',
        '\App\Http\Controllers\PeminjamanController@show'
    )->middleware('Role:Peminjam-Operator-Administrator')
        ->name('peminjaman.show');
    Route::delete(
        '/peminjaman/{id}',
        '\App\Http\Controllers\PeminjamanController@delete'
    )->middleware('Role:Peminjam-Administrator')
        ->name('peminjaman.delete');

    Route::get(
        '/peminjaman/edit/{id}',
        '\App\Http\Controllers\PeminjamanController@edit'
    )->middleware('Role:Peminjam')
        ->name('peminjaman.edit');

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
    )->Middleware('Role:Peminjam')
        ->name('detailPinjam.create');
    Route::post(
        '/detail-pinjam/create',
        '\App\Http\Controllers\DetailPinjamController@store'
    )->Middleware('Role:Peminjam')
        ->name('detailPinjam.store');
    Route::get(
        '/detail-pinjam/edit/{id}',
        '\App\Http\Controllers\DetailPinjamController@edit'
    )->Middleware('Role:Peminjam')
        ->name('detailPinjam.edit');
    Route::put(
        '/detail-pinjam/edit/{id}',
        '\App\Http\Controllers\DetailPinjamController@update'
    )->Middleware('Role:Peminjam')
        ->name('detailPinjam.update');
    Route::delete(
        '/detail-pinjam/{id}',
        '\App\Http\Controllers\DetailPinjamController@delete'
    )->middleware('Role:Peminjam-Administrator')
        ->name('detailPinjam.delete');

// });
// * End Peminjam Middleware Routes
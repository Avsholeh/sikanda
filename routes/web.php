<?php

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

Route::group(['prefix' => '/'], function () {
    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        echo json_encode(['cleared']);
    });

    Voyager::routes();

    Route::middleware(['admin.user'])->group(function () {

        // ================= UPLOAD DOKUMEN ================= //

        Route::get('upload-dokumen', [\App\Http\Controllers\UploadController::class, 'index'])
            ->name('upload-dokumen.index');

        Route::post('upload-dokumen', [\App\Http\Controllers\UploadController::class, 'upload'])
            ->name('upload-dokumen.store');

        Route::get('upload-dokumen/{dokumen}', [\App\Http\Controllers\UploadController::class, 'edit'])
            ->name('upload-dokumen.edit');

        Route::post('upload-dokumen/{dokumen}', [\App\Http\Controllers\UploadController::class, 'update'])
            ->name('upload-dokumen.update');

        // ================= DOKUMEN ================= //

        // status dokumen
        Route::get('dokumen/{status?}', [\App\Http\Controllers\DokumenController::class, 'index'])
            ->name('dokumen.index');

        // show dokumen
        Route::get('dokumen/lihat/{dokumen}', [\App\Http\Controllers\DokumenController::class, 'show'])
            ->name('dokumen.show');

        // delete dokumen
        Route::get('dokumen/{dokumen}/delete', [\App\Http\Controllers\DokumenController::class, 'delete'])
            ->name('dokumen.delete');

        // delete spm
        Route::get('spm/{spm}/delete', [\App\Http\Controllers\DokumenController::class, 'deleteSpm'])
            ->name('dokumen.spm.delete');

        // delete sp2d
        Route::get('sp2d/{sp2d}/delete', [\App\Http\Controllers\DokumenController::class, 'deleteSp2d'])
            ->name('dokumen.sp2d.delete');

        // delete pendukung
        Route::get('pendukung/{pendukung}/delete', [\App\Http\Controllers\DokumenController::class, 'deletePendukung'])
            ->name('dokumen.pendukung.delete');

        // ================= VERIFIKASI ================= //

        Route::get('verifikasi/{dokumen}', [\App\Http\Controllers\VerifikasiController::class, 'show'])
            ->name('verifikasi.show');

        Route::post('verifikasi/proses', [\App\Http\Controllers\VerifikasiController::class, 'proses'])
            ->name('verifikasi.proses');

        // ================= VIEWER ================= //

        Route::get('viewer-preview/{jenisDokumen}/{dokumenId}', [\App\Http\Controllers\ViewerController::class, 'preview'])
            ->name('viewer.preview');

        Route::get('viewer-download/{jenisDokumen}/{dokumenId}', [\App\Http\Controllers\ViewerController::class, 'download'])
            ->name('viewer.download');

        Route::get('viewer-download-semua/{dokumenId}', [\App\Http\Controllers\ViewerController::class, 'downloadSemua'])
            ->name('viewer.download_semua');

        // ================= LAPORAN ================= //

        Route::get('laporan', function() {
            return redirect()->route('laporan.data_dokumen');
        });

        // ================= DATA DOKUMEN

        Route::get('laporan/data_dokumen', [\App\Http\Controllers\LaporanController::class, 'dataDokumen'])
            ->name('laporan.data_dokumen');

        Route::get('laporan/detail/{dokumen}', [\App\Http\Controllers\LaporanController::class, 'detail'])
            ->name('laporan.detail');

        Route::post('laporan', [\App\Http\Controllers\LaporanController::class, 'pencarian'])
            ->name('laporan.pencarian');

        // ================= REKAP DOKUMEN

        Route::get('laporan/rekap_dokumen', [\App\Http\Controllers\LaporanController::class, 'rekapDokumen'])
            ->name('laporan.rekap_dokumen');

        Route::post('laporan/rekap_pencarian', [\App\Http\Controllers\LaporanController::class, 'rekapDokumen'])
            ->name('laporan.rekap_pencarian');

    });
});

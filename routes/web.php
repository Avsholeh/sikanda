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
        return "cleared.";
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

        Route::get('dokumen/{status?}', [\App\Http\Controllers\DokumenController::class, 'index'])
            ->name('dokumen.index');

        // delete dokumen
        Route::get('dokumen/{dokumen}/delete', [\App\Http\Controllers\DokumenController::class, 'delete'])
            ->name('dokumen.delete');

        // delete spm
        Route::get('spm/{spm}/delete', [\App\Http\Controllers\DokumenController::class, 'deleteSpm'])
            ->name('dokumen.spm.delete');

        // delete sp2d
        Route::get('sp2d/{sp2d}/delete', [\App\Http\Controllers\DokumenController::class, 'deleteSp2d'])
            ->name('dokumen.sp2d.delete');

        // ================= VIEWER ================= //

        Route::post('viewer/generate', [\App\Http\Controllers\ViewerController::class, 'generate'])
            ->name('viewer.generate');

        Route::get('viewer/{dokumenId}/{jenisDokumen}/{documentHash}', [\App\Http\Controllers\ViewerController::class, 'index'])
            ->name('viewer.index');

        // ================= LAPORAN ================= //

        Route::get('laporan', [\App\Http\Controllers\LaporanController::class, 'index'])
            ->name('laporan.index');

        Route::post('laporan', [\App\Http\Controllers\LaporanController::class, 'pencarian'])
            ->name('laporan.pencarian');

    });
});

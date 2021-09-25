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
    Voyager::routes();

    Route::get('upload-dokumen', [\App\Http\Controllers\UploadController::class, 'index'])
        ->name('upload-dokumen.index');

    Route::post('upload-dokumen', [\App\Http\Controllers\UploadController::class, 'upload'])
        ->name('upload-dokumen.store');

    Route::get('upload-dokumen/{id}', [\App\Http\Controllers\UploadController::class, 'edit'])
        ->name('upload-dokumen.edit');

    Route::post('upload-dokumen/{id}', [\App\Http\Controllers\UploadController::class, 'updateUpload'])
        ->name('upload-dokumen.update');
});

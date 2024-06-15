<?php

use Illuminate\Support\Facades\Route;
use Modules\News\Http\Controllers\NewsController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::prefix('v1')->group(function () {

    // News routes
    Route::get('', [NewsController::class, 'index'])->name('news.index');


});

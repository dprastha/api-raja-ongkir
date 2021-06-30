<?php

use App\Http\Controllers\getApi;
use App\Http\Controllers\OngkirController;
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

Route::get('/', [OngkirController::class, 'index']);
Route::get('getCity/ajax/{id}', [OngkirController::class, 'ajax']);

// Route::resource('ongkir', OngkirController::class);

// Route::get('/debug-sentry', function () {
//    throw new Exception('My first Sentry error!');
// });

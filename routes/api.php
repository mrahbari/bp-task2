<?php

use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
|--------------------------------------------------------------------------
| Api Transaction routes
|--------------------------------------------------------------------------
*/
Route::prefix('{api_version}/transactions/{source?}')->where(['api_version' => get_api_versions()])->get('/', [TransactionController::class])->name('api.transactions.invoke');

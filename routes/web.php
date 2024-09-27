<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form-submit', [QueueController::class, 'formSubmit'])->name('form-submit');
Route::post('/form-submit', [QueueController::class, 'formSubmitStore'])->name('form-submit.store');
Route::get('/send-otp', [QueueController::class, 'sendOPT'])->name('send-otp');

//fail job
Route::get('/money-transfer', [QueueController::class, 'moneyTransfer'])->name('money-transfer');
Route::post('/money-transfer', [QueueController::class, 'moneyTransferSubmit'])->name('money-transfer.submit');

<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('contact', [ContactController::class, 'contact']);
Route::get('get_contact/{id}', [ContactController::class, 'getContact']);
Route::post('save_contact',  [ContactController::class, 'saveContact']);
Route::post('update_contact/{id}',  [ContactController::class, 'updateContact']);
Route::delete('delete_contact/{id}', [ContactController::class, 'deleteContact']);

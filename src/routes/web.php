<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactListController;  

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


Route::get('/', [ContactFormController::class, 'index']);    

Route::group(['prefix' => 'contactform'], function() {
    Route::get('', [ContactFormController::class, 'index']);
    Route::post('back', [ContactFormController::class, 'back']);
    Route::post('confirm', [ContactFormController::class,'check']);
    Route::post('thanks', [ContactFormController::class,'add']);
    Route::get('thanks', [ContactFormController::class,'thanks']);
});

Route::group(['prefix' => 'auth'], function() {
    Route::get('login', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'registerForm']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'contactlist'], function() {
        Route::get('', [ContactListController::class, 'index']);
        Route::post('reset', [ContactListController::class, 'reset']);
        Route::get('search', [ContactListController::class, 'search']);
        Route::get('export', [ContactListController::class, 'export']);
        Route::delete('delete/{id}', function($id) {
            $contact = \App\Models\Contact::findOrFail($id);
            $result = $contact->delete();
            echo $result;
        });
    });
});


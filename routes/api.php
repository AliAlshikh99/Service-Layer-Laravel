<?php

use App\Models\file;
use App\Models\User;
use App\Models\album;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GoogleLoginController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Spatie\MediaLibrary\MediaCollections\Models\manipulateMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media\qualifyColumn;



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

Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/index', 'index')->middleware('can:read_data');
        Route::post('/create', 'store')->middleware('can:write_data');;
        Route::put('update', 'update')->middleware('can:update_data');;
        Route::delete('delete', 'destroy')->middleware('can:delete_data');;
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\IndexController as TestIndexConroller;
use App\Http\Middleware\TestMiddleware;

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

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

// 検証用
Route::get('/test', [TestIndexConroller::class, 'index'])->middleware([TestMiddleware::class])->name('test.index');

require __DIR__.'/auth.php';

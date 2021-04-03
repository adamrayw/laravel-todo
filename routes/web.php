<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    return view('home.index');
});

Route::get('/pricing', function () {
    return view('home.pricing');
});

Route::get('/dashboard/{id}', [TodoController::class, 'destroy']);

Route::post('/dashboard/check/{id}', [TodoController::class, 'check']);



Route::get('/dashboard', function () {

    $data = Todo::where('user_id', Auth::user()->id)->get();

    return view('dashboard', ['data' => $data]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::put('/dashboard', [TodoController::class, 'store']);

<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts/create',[PostController::class,'create'])->name('create.post')->middleware('permission:write post');
// Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('edit.post');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('role:editor|admin');

require __DIR__.'/auth.php';
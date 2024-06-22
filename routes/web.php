<?php

use App\Http\Controllers\PostAdminControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get("/", function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('posts.admin.show_all');
})->middleware(['auth', 'verified','Checkadmin'])->name('dashboard');
Route::get('/dashboard', function () {
    return redirect()->route('posts.show_all');
})->middleware(['auth', 'verified','Checkuser'])->name('dashboard');
// Route::get('/', function () {
//     return view('auth.login');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified','Checkadmin'])->group(function () {
    Route::get('/posts/admin',[PostAdminControler::class,'index'])->name('posts.admin');
    Route::get('/admin',[PostAdminControler::class,'home'])->name('posts.admin.show_all');
    Route::get('/posts/create/admin',[PostAdminControler::class,'create'])->name('posts.admin.create');
    Route::post('/posts/store/admin',[PostAdminControler::class,'store'])->name('posts.admin.store');
    Route::get('/posts/edit/admin/{id}',[PostAdminControler::class,'edit'])->name('posts.admin.edit');
    Route::put('/posts/Update/admin/{id}',[PostAdminControler::class,'update'])->name('posts.admin.update');
    Route::delete('/posts/delete//admin{id}',[PostAdminControler::class,'delete'])->name('posts.admin.delete');
    Route::get('/posts/show//admin{id}',[PostAdminControler::class,'show'])->name('Posts.admin.show');
    Route::get('/posts/search/admin',[PostAdminControler::class,'search'])->name('posts.admin.search');
    Route::get('/posts/log/admin',[PostAdminControler::class,'log'])->name('posts.admin.logout');

});

Route::middleware(['auth', 'verified','Checkuser'])->group(function () {
    // Route::get('/posts/user',[PostController::class,'index'])->name('posts');
    // Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    // Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    // Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    // Route::put('/posts/Update/{id}',[PostController::class,'update'])->name('posts.update');
    // Route::delete('/posts/delete/{id}',[PostController::class,'delete'])->name('posts.delete');
    Route::get('/user',[PostController::class,'home'])->name('posts.show_all');
    Route::get('/posts/show/user/{id}',[PostController::class,'show'])->name('Posts.show');
    Route::get('/posts/search/user',[PostController::class,'search'])->name('posts.search');
    Route::get('/posts/log/user',[PostController::class,'log'])->name('posts.logout');


});
require __DIR__.'/auth.php';

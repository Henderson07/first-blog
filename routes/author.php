<?php

use illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'backend.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'backend.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class, 'ResetForm'])->name('reset-form');
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile', 'backend.pages.profile')->name('profile');
        Route::post('/change-profile-picture', [AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');

        // somente o administrador pode acessar as seguintes rotas
        Route::middleware(['isAdmin'])->group(function () {
            Route::view('/settings', 'backend.pages.settings')->name('settings');
            Route::post('/change-blog-logo', [AuthorController::class, 'changeBlogLogo'])->name('change-blog-logo');
            Route::post('/change-blog-favicon', [AuthorController::class, 'changeBlogFavicon'])->name('change-logo-favicon');
            Route::view('/authors', 'backend.pages.authors')->name('authors');
            Route::view('categories', 'backend.pages.categories')->name('categories');
        });

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::view('/add-post', 'backend.pages.add-post')->name('add-post');
            Route::post('/create', [AuthorController::class, 'createPost'])->name('create');
            Route::view('/all', 'backend.pages.all_posts')->name('all_posts');
            Route::get('/edit-post', [AuthorController::class, 'editPost'])->name('edit-post');
            Route::post('/update-post', [AuthorController::class, 'updatePost'])->name('update-post');
        });
    });
});

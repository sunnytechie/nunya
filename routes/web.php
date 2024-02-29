<?php

use App\Http\Controllers\Dashboard\AboutController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AgeGroupController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\SlideController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\MembershipController;

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

//home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//members page
Route::get('/membership', [App\Http\Controllers\PagesController::class, 'membership'])->name('membership');
Route::post('/membership', [App\Http\Controllers\PagesController::class, 'membershipStore'])->name('membership.store');

//contact page
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\PagesController::class, 'contactStore'])->name('contact.store');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    //event
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/create', [EventController::class, 'store'])->name('events.store');
        Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::patch('/{event}/edit', [EventController::class, 'update'])->name('events.update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });

    //post
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/create', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::patch('/{post}/edit', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    //slides
    Route::prefix('slides')->group(function () {
        Route::get('/', [SlideController::class, 'index'])->name('slides.index');
        Route::get('/create', [SlideController::class, 'create'])->name('slides.create');
        Route::post('/create', [SlideController::class, 'store'])->name('slides.store');
        Route::get('/{slide}', [SlideController::class, 'show'])->name('slides.show');
        Route::get('/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');
        Route::patch('/{slide}/edit', [SlideController::class, 'update'])->name('slides.update');
        Route::delete('/{slide}', [SlideController::class, 'destroy'])->name('slides.destroy');
    });

    //projects
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/create', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::patch('/{project}/edit', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    //members
    Route::prefix('members')->group(function () {
        Route::get('/', [MembershipController::class, 'index'])->name('members.index');
    });

    //agegroup
    Route::prefix('agegroup')->group(function () {
        Route::get('/', [AgeGroupController::class, 'index'])->name('agegroup.index');
        Route::get('/create', [AgeGroupController::class, 'create'])->name('agegroup.create');
        Route::post('/create', [AgeGroupController::class, 'store'])->name('agegroup.store');
        Route::get('/{agegroup}/edit', [AgeGroupController::class, 'edit'])->name('agegroup.edit');
        Route::patch('/{agegroup}/edit', [AgeGroupController::class, 'update'])->name('agegroup.update');
        Route::delete('/{agegroup}', [AgeGroupController::class, 'destroy'])->name('agegroup.destroy');
    });

    //about
    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::patch('/', [AboutController::class, 'update'])->name('about.update');
    });

    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [AboutController::class, 'settings'])->name('settings');
        Route::patch('/', [AboutController::class, 'updateSettings'])->name('settings.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

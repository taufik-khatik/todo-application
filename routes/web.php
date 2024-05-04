<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication routes
Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/invitations/send/{user}', [InvitationController::class, 'send'])->name('invitations.send');
        
        // Todo routes
        Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
        Route::post('/todos', [TodoController::class, 'store'])->name('todos.store'); // Corrected route for creating todos
        Route::delete('/todos/{id}/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');

        // Assign todo to user routes
        Route::get('/todos/assign/{id}/edit', [TodoController::class, 'assignView'])->name('todos.assign.view');
        Route::put('/todos/assign/{id}', [TodoController::class, 'assign'])->name('todos.assign');
    });

    // Todo routes
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');  
    Route::get('/todos/{id}/show', [TodoController::class, 'show'])->name('todos.show');  
    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{id}/update', [TodoController::class, 'update'])->name('todos.update');
    


    // User routes
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // // Profile routes
    // Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    // Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.edit-profile');
    // Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');
});


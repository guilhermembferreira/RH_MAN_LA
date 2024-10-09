<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::redirect('/', 'home');
    Route::view('/home', 'home')->name('home');

    // PAGINA DE PERFIL
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data', [ProfileController::class, 'updateUserData'])->name('user.profile.update-user-data');

    // Departamentos
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/new-dapartment', [DepartmentController::class, 'newDepartment'])->name('departments.new-department');
    Route::post('/departments/create-dapartment', [DepartmentController::class, 'createDepartment'])->name('departments.create-department');
    
    Route::get('/departments/edit-department/{id}', [DepartmentController::class, 'editDepartment'])->name('departments.edit-department');
    Route::post('/departments/update-dapartment', [DepartmentController::class, 'updateDepartment'])->name('departments.update-department');
});
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RhUserController;

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

    //delete route of department
    Route::get('/departments/delete-department-confirmation/{id}', [DepartmentController::class, 'deleteDepartment'])->name('departments.delete-department-confirmation');
    Route::get('/departments/delete-department-conf/{id}', [DepartmentController::class, 'deleteDepartmentConf'])->name('departments.delete-department-conf');

    // Colaboradores
    Route::get('/rh-users', [RhUserController::class, 'index'])->name('colaborators.rh-users');
    Route::get('/rh-users/new-dapartment', [RhUserController::class, 'newColaborator'])->name('colaborators.new-colaborator');
    Route::post('/rh-users/create-dapartment', [RhUserController::class, 'createColaborator'])->name('colaborators.create-colaborator');
    
});
<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "RH MANGNT";
});

Route::get('/admin', function () {

    $admin = User::with('detail', 'department')->find(1);
    dd($admin->toArray());
});
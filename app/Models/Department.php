<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function users()
    {
        // Cada departamento tem vários utilizadores
        return $this->belongsToMany(User::class);
    }
}

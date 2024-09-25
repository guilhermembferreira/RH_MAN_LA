<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function detail()
    {
        // Cada utilizador tem um user_detail
        return $this->hasOne(UserDetail::class);
    }

    public function department()
    {
        // Este utilizador pertence a um departamento
        return $this->belongsTo(Department::class);
    }
}

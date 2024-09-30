<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Department;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

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

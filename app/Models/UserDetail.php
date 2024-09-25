<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    public function user()
    {
        // Cada detalhe de utilizador pertence a um utilizador
        return $this->belongsTo(User::class);
    }
}

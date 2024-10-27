<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Team extends Model
{
    public function user()
    {
        return $this->belongstoMany(User::class);
    }
}

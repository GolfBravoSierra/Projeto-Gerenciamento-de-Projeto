<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Team extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongstoMany(User::class, 'team_users');
    }
}

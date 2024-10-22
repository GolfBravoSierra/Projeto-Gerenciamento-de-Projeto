<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContest extends Model
{
    protected $fillable = [
        'user_id',
        'contest_id',
    ];
}

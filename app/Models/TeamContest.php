<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamContest extends Model
{
    protected $fillable = [
        'team_id',
        'contest_id',
    ];
}

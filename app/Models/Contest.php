<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['title', 'description', 'mode', 'begin_date', 'end_date', 'created_by'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Option extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'text',
        'value',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

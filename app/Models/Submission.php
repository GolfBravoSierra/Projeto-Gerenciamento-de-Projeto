<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;

class Submission extends Model
{
    protected $fillable = [
        'answer',
        'status',
        'user_id',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status($answer)
    {
        if($this->question->correct_answer != $this->answer)
        {
            return false;
        }
        return true;
    }
}

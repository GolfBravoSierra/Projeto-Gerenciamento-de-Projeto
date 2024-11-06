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

    public function assignPoints(UserContest $usercontest): void
    {
        $first_correct = \Carbon\Carbon::parse($this->question->submissions->where('status', true)->first()->created_at);
        if($this->status == true)
            {
                $usercontest->points += $this->question->points - (int)round($first_correct->diffInMinutes(now()),0);
                if($usercontest->points < $this->question->points/10)
                {
                    $usercontest->points = $this->question->points/10;
                }
                $usercontest->save();
            }
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status(): void
    {
        if($this->question->correct_answer != $this->answer)
        {
            $this->status = false;
            $this->save();
        }
        else
        {
            $this->status = true;
            $this->save();
        }   
    }
}

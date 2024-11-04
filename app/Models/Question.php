<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Contest;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'correct_answer',
        'answer'
    ];

    public function status()
    {
        if($this->answer == $this->correct_answer)
        {
            return 0;   //questão finalizada
        }
        return 1;       //questão NÃO finalizada
    }

    public function options()
    {
        return $this->HasMany(Option::class);
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}

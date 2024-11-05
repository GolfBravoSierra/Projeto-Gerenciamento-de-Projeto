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
        'name',
        'question_text',
        'correct_answer',
        'contest_id',
        'points',
    ];

    public function options()
    {
        return $this->HasMany(Option::class);
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}

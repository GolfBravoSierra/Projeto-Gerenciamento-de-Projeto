<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function sender()
    {
        return $this->hasOne(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

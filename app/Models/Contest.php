<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Question;
use App\Models\User;
use App\Models\Team;

class Contest extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'title', 
                            'description', 
                            'mode', 
                            'begin_date', 
                            'end_date', 
                            'creator_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('title','like','%'.$search.'%')
                ->orwhere('description','like','%'.$search.'%')
        );
    }

    public function creator():BelongsTo
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function users():BelongsToMany
    {
        return $this->belongstomany(User::class,'user_contests');
    }

    public function teams():BelongsToMany
    {
        return $this->belongstomany(Team::class,'team_contests');
    }

    public function questions():HasMany
    {
        return $this->hasMany(Question::class);
    }
}

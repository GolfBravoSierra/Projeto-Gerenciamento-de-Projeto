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

    public function duration()
    {
        $start_date = \Carbon\Carbon::parse($this->begin_date);
        $end_date = \Carbon\Carbon::parse($this->end_date);
        return round($start_date->diffInHours($end_date),1);
    }

    public function status()
    {
        $start_date = \Carbon\Carbon::parse($this->begin_date);
        $end_date = \Carbon\Carbon::parse($this->end_date);
        if($start_date->diffInMonths(now()) >= 1){
            return 0;       //Closed
        }
        if($start_date->diffInHours(now()) < 0){
            return 2;       //Open
        } else if ($end_date->diffInHours(now()) < 0){
            return 1;       //Happening
        } else{
            return 0;       //Closed
        }
    }

    public function creator():BelongsTo
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function users():BelongsToMany
    {
        return $this->belongstomany(User::class,'user_contests');
    }

    public function questions():HasMany
    {
        return $this->hasMany(Question::class);
    }
}

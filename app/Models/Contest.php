<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contest extends Model
{
    protected $fillable = [ 'title', 
                            'description', 
                            'mode', 
                            'begin_date', 
                            'end_date', 
                            'created_by'];

    public function users()
    {
        return $this->belongstomany(User::class,'usercontests');
    }
}

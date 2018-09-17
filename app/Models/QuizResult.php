<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    protected $fillable = [
    	'voteResult',
    ];
    public function user()
    {
        return $this->hasOne("App\Models\User");
    }

    public function restaurant()
    {
        return $this->hasOne("App\Models\Restaurant");
    }
}
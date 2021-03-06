<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    protected $table = 'quizresults';

    protected $fillable = [
    	'voteResult', 'rating'
    ];

    public function quiz() {
      return $this->belongsTo('App\Models\Quiz');
    }
    public function user()
    {
        return $this->hasOne("App\Models\User");
    }

    public function restaurant()
    {
        return $this->hasOne("App\Models\Restaurant");
    }

    public function getRatingChecked($integer) {
      if($this->rating == null) {
        return " ";
      }
      if($integer == $this->rating) {
        return " checked=\"checked\" ";
      }
      else {
        return " ";
      }
    }
}

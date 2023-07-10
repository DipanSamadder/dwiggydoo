<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Question extends Model
{
    
 protected $fillable = ['question_type','question','options','answer','published_date','status'];
 

 public function types(){
    return $this->belongsTo(QuestionsType::class, 'question_type');
 }
}

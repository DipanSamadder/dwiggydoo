<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class QuestionsAttempts extends Model
{
    
 protected $fillable = ['question_id','right_ans','choose_ans','result','submit_date'];
 
}

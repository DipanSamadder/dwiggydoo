<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class QuestionsTask extends Model
{
    
    protected $fillable = ['question_id','image','is_view','status','taskable_id'];

    public function subject(){
        return $this->morph('taskable');
    }
    public function user(){
        return $this->belongsTo(User::class, 'taskable_id');
    }
    public function questions(){
        return $this->belongsTo(Question::class, 'question_id');
    }
}

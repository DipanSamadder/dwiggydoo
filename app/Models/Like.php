<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   protected $fillable = ['dogs_id'];

   public function subject(){
        return $this->morphTo('likeable');
    }

    public function dog(){
    	return $this->belongsTo(Dog::class, 'dogs_id');
    }
}

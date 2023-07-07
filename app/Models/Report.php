<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   protected $fillable = ['friendships_id',  'receiver_id', 'message'];

    public function subject(){
    	return $this->morphTo('reportable');
   }
}

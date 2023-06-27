<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = ['receiver_id', 'view', 'status'];


    public function subject(){
    	return $this->morphTo('dogable');
    }

    public function friend()
    {
        return $this->belongsTo(Dog::class, 'dogable_id');
    }
   

}

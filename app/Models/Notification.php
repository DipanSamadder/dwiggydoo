<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Notification extends Model
{

   	public $timestamps = false;


   	public function user(){
   		return $this->BelongsTo('App\User', 'sender_id');
   	}
}

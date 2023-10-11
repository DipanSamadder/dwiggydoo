<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Notification extends Model
{

   	public $timestamps = false;


   	// public function user(){
   	// 	return $this->BelongsTo(User::class, 'sender_id');
   	// }
	
	public function dog(){
		return $this->BelongsTo(Dog::class, 'sender_id');
	}
	public function receiver_dog(){
		return $this->BelongsTo(Dog::class, 'receiver_id');
	}
}

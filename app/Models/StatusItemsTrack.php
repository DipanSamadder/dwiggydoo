<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StatusItemsTrack extends Model
{
	 public function user(){
        return $this->BelongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['type', 'user_id', 'points', 'source_id','status'];
}

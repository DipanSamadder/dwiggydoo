<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class Feed extends Model  implements HasMedia
{
	use InteractsWithMedia;

	protected $fillable = ['media', 'content', 'slug','type', 'status'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('feeds')->registerMediaConversions( function (Upload $upload = null){
            $this->addMediaConversion('full')
              ->format('webp');
            $this->addMediaConversion('thumb')
                ->format('webp')
                ->width(600)
                ->height(300);
            $this->addMediaConversion('cover')
                ->format('webp')
                ->width(175)
                ->height(75);
            $this->addMediaConversion('avatar')
                ->format('webp')
                ->width(80)
                ->height(80);
            $this->addMediaConversion('placeholder')
              ->format('webp')->blur(10);
        });
    }
    public function dogs(){
    	return $this->belongsTo(Dog::class,'feedable_id', 'id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


    public function like()
    {
        return $this->morphOne(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    public function subject(){
        return $this->morphTo('feedable');
   }



    public static function boot()
    {
        parent::boot();

        // Define a "deleting" event listener to delete associated likes, comments, and replies
        static::deleting(function ($post) {
            $post->likes()->delete();
            $post->comments()->delete();
        });
    }



}

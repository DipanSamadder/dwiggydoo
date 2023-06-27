<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;



class StatusItem extends Model implements HasMedia
{
	use InteractsWithMedia;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('status_image')
        ->acceptsMimeTypes(['image/jpg','image/jpeg','image/png','image/svg','image/webp','image/gif'])

        ->registerMediaConversions( function (Upload $upload = null){
            $this->addMediaConversion('video')
            	->quality(90)
            	->optimize();
            $this->addMediaConversion('full')
            	->quality(90)
            	->optimize()
              	->format('webp');
            $this->addMediaConversion('thumb')
                ->format('webp')
                ->width(600)
                ->height(300);
            $this->addMediaConversion('cover')
                ->format('webp')
                ->width(175)
                ->height(75);
            $this->addMediaConversion('placeholder')
              ->format('webp')->blur(10)
            	->quality(80)
            	->optimize();
        });

        $this->addMediaCollection('status_video')
        ->acceptsMimeTypes(['video/mp4','video/mpg','video/mpeg','video/webm','video/ogg','video/avi','video/mov','video/flv','video/swf','video/mkv','video/wmv'])
        ->registerMediaConversions( function (Upload $upload = null){
            $this->addMediaConversion('video')
            	->quality(90)
            	->optimize();
        });
    }


    public function statusItemsTracks(){
        return $this->HasMany(StatusItemsTrack::class, 'status_items_id', 'id');
    }
 
}

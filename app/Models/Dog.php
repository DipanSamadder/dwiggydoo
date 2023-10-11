<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class Dog extends Model  implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('dogs')->registerMediaConversions( function (Upload $upload = null){
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

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    public function breeds(){
        return $this->belongsTo(Breed::class, 'breed_id');
    }
    
    public function posts()
    {
        return $this->hasMany(Friendship::class, 'sender_id');
    }

    public function feeds(){
        return $this->morphMany(Feed::class, 'feedable');
    }
    public function block(){
        return $this->morphMany(Block::class, 'blockable');
    }
    public function report(){
        return $this->morphMany(Report::class, 'reportable');
    }

    public function friendships(){
        return $this->morphMany(Friendship::class, 'dogable');
    }

    public function connectedfriendships($dog_id){

         return Friendship::where(function ($query) use ($dog_id) {
                    $query->where('dogable_id', $dog_id)
                        ->where('status', 1);
                })
                ->orWhere(function ($query) use ($dog_id) {
                    $query->where('receiver_id', $dog_id)
                        ->where('status', 1);
                })->where('status', 1)->get();

    }

    public function sentFriendRequestsConnected()
    {
         return $this->belongsToMany(Dog::class, 'friendships', 'dogable_id', 'receiver_id')
            ->where('friendships.status', 1);
    }

    public function receivedFriendRequestsConnected()
    {
        return $this->belongsToMany(Dog::class, 'friendships', 'receiver_id', 'dogable_id')
            ->where('friendships.status', 1);
    }


    public function friendship(){
        return $this->morphOne(Friendship::class, 'dogable');
    }

    /*
    public function friendships()
    {
        return $this->hasMany(Friendship::class);
    }*/

    public function isFriendWith(Dog $dog_id)
    {
        return $this->friendships()
            ->where('receiver_id', $dog_id->id)
            ->where('status', 1)
            ->exists();
    }
    public function isStoreFriend(Dog $dog_id)
    {
        return $this->friendships()
            ->where('receiver_id', $dog_id->id)
            ->exists();
    }

    public function sentFriendRequests()
    {
        return $this->friendships()->where('status', 0);
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(Friendship::class, 'receiver_id')->where('status', 0);
    }


    public function hasSentFriendRequestTo($receiver_id)
    {
        return $this->sentFriendRequests()->where('receiver_id', $receiver_id->id)->exists();
    }

    public function hasReceivedFriendRequestFrom($dog_id)
    {
        return $this->receivedFriendRequests()->where('dogable_id', $dog_id->id)->exists();
    }

    public function connectedFriendsFeeds($friendsWithMe)
    {
 
        return Feed::whereIn('feedable_id', $friendsWithMe)->where('status', 1)->get();

    }

}

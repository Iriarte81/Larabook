<?php

namespace App\Users;

trait FollowableTrait
{
    /*
    * Get this list of users that the current user follows
    */

    public function followedUsers()

    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    /*
    * Get the list of users who follow the current user
    */

    public function followers()

    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }

    /*
    * Determine if current user follows another user
    */

    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id')->all();

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

}
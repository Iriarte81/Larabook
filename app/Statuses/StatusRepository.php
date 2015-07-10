<?php

namespace App\Statuses;

use App\User;
use App\Statuses\Status;

class StatusRepository {

	public function getAllForUser(User $user)
	{
		return $user->statuses()->with('user')->latest()->get();
	}

    /*
     * Get the feed for a user
     */
    public function getFeedforUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }
	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);
	}
}
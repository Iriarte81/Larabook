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
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }
	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);
	}
    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($body, $statusId);
        User::findOrFail($userId)->comments()->save($comment);
        return $comment;
    }
}
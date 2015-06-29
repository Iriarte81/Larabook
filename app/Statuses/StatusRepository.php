<?php

namespace App\Statuses;

use App\User;
use App\Statuses\Status;

class StatusRepository {

	public function getAllForUser(User $user)
	{
		return $user->statuses()->with('user')->latest()->get();
	}

	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);
	}
}
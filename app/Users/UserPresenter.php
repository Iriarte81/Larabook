<?php

namespace App\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
	/*
	Present a link to the user's gravatar

	@param int $size
	@return string

	 */
	
	public function gravatar($size = 30)
	{
		$email = md5($this->email);

		return "//www.gravatar.com/avatar/{email}?s={$size}";
	}

    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $noun = str_plural('Follower', $count);

        return "{$count} {$noun}";

    }

    public function statusCount()
    {
        $count = $this->entity->statuses()->count();
        $noun = str_plural('Status', $count);

        return "{$count} {$noun}";

    }


}
<?php

namespace App\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{
	/*
		Display how long it has been
		since the published date.
		@return mixed
	 */
	public function timeSincePublished()
	{
		return $this->created_at->diffForHumans();
	}

}

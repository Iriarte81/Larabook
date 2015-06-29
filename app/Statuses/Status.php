<?php

namespace App\Statuses;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Status extends Model
{
	use PresentableTrait;

	protected $table = 'statuses';
	protected $fillable = ['body'];

	/*
		Path to the presenter for a status

		@var string
	 */
	protected $presenter = "App\Statuses\StatusPresenter";

	public function user() {
		return $this->belongsTo('App\User');
	}

	public static function publish($body) {
		return new static(compact('body'));
	}

}
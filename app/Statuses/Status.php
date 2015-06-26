<?php

namespace App\Statuses;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';
	protected $fillable = ['body'];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public static function publish($body) {
		return new static(compact('body'));
	}

}
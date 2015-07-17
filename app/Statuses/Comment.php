<?php

namespace App\Statuses;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Comment extends Model
{
    use PresentableTrait;

    protected $table = 'comments';
    protected $fillable = ['user_id', 'status_id', 'body'];

    /*
        Path to the presenter for a status

        @var string
     */
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function leave($body, $statusId)
    {
        return new static([
            'body' =>  $body,
            'status_id' => $statusId
        ]);
    }
}
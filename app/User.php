<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Support\Facades\Auth;
use App\Statuses\Comment;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, PresentableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
        Path to the presenter for a user

        @var string

     */
    
    protected $presenter = 'App\Users\UserPresenter';



    // Password must always be hashed

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


     /**
     * Create a new user instance after a valid registration.
     *
     * @param $name
     * @param $email
     * @param $password
     *
     * @return User
     */
    public static function register($username, $email, $password)
    {
        return new static(compact('username', 'email', 'password'));
        

    }

    public function statuses()
    {
        return $this->hasMany('App\Statuses\Status')->latest();
    }

    /*
     * Determine is the given user is the same
     * as the current one
     * @param User $user
     * @return boolean
     *
     */

    public function comments()
    {
        return $this->hasMany('App\Statuses\Comment');
    }

    public function is($user) {

        if (is_null($user)) return false;

        return $this->username == $user->username;

    }
    /*
     * Get this list of users that the current user follows
     */

    public function followedUsers()

    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id' )
                    ->withTimestamps();
    }

    /*
     * Get the list of users who follow the current user
     */

    public function followers()

    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id' )
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
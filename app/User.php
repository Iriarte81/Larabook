<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
        return $this->hasMany('App\Statuses\Status');
    }

}

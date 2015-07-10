<?php
namespace App\Users;

use DB;
use App\User;

class UserRepository
{
    /**
     * Persist a user.
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }
    /*
     * Get a paginated list of all users
     * @param int $howMany
     * @return mixed
     *
     */
    public function getPaginated($howMany = 25)
    {
        // return User::Paginate($howMany);
        return User::orderBy('username', 'asc')->simplePaginate($howMany);

    }

    /*
     * Fetch a user by their username
     */

    public function findByUsername($username)
    {
        return User::with(['statuses' => function ($query)
        {
            $query->latest();
        }])->whereUsername($username)->first();
    }

    /*
     * Find a user by their id
     * @param $id
     * @return
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /* Follow a Larabook user
    */

    public function follow($userIdToFollow, User $user) {
       return $user->follows()->attach($userIdToFollow);
    }

}

?>
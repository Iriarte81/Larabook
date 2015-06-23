<?php
namespace App\Users;

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
}


?>
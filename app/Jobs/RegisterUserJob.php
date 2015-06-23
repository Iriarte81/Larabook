<?php

namespace App\Jobs;

use App\User;
use App\Events\UserRegistred;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class RegisterUserJob extends Job implements SelfHandling

{
    private $username;
    private $email;
    private $password;
    /**
     * Create a new job instance.
     *
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    /**
     * Execute the job.
     *
     * @param UserRepository $repository
     * @return User
     */
    public function handle(UserRepository $repository)
    {
        $user = User::register($this->username, $this->email, $this->password);
        $repository->save($user);
        event(new \App\Events\UserRegistered($user));
        return $user;
    }
}

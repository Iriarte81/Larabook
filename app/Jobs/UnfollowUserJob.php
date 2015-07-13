<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class UnfollowUserJob extends Job implements SelfHandling
{

    public $userId;
    public $userIdToUnfollow;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId['userId'];
        $this->userIdToUnfollow = $userId['UserIdToUnfollow'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $userRepository)
    {
        $user = $userRepository->findById($this->userId);
        $userRepository->unfollow($this->userIdToUnfollow, $user);
        return $user;
    }
}

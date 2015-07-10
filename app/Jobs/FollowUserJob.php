<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class FollowUserJob extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $userId;
    public $userIdToFollow;

    public function __construct($userId)
    {
        $this->userId = $userId['userId'];
        $this->userIdToFollow = $userId['userIdToFollow'];
    }

    /**
     * Execute the job.
     *
     *
     */
    public function handle(UserRepository $userRepository)
    {
        $user = $userRepository->findById($this->userId);
        $userRepository->follow($this->userIdToFollow, $user);
        return $user;
    }
}

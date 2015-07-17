<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Statuses\StatusRepository;
use App\Statuses\Comment;

class LeaveCommentOnStatusJob extends Job implements SelfHandling
{

    public $statusId;
    public $userId;
    public $body;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->statusId = $input['status_id'];
        $this->userId = $input['user_id'];
        $this->body = $input['body'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StatusRepository $statusRepo)
    {
        $comment = $statusRepo->leaveComment($this->userId, $this->statusId, $this->body);

        return $comment;
    }
}

<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Statuses\Status;
use App\Events\StatusWasPublished;
use App\Statuses\StatusRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class PublishStatusJob extends Job implements SelfHandling
{
    private $body;

    private $userId;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StatusRepository $repository)
    {
        $status = Status::publish($this->body);
        $repository->save($status, $this->userId);
        event(new StatusWasPublished($status));
        return $status;
    }
}

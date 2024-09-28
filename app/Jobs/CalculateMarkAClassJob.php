<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateMarkAClassJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


     /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 10;


    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions =11;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 500;

    public $jobId;
    /**
     * Create a new job instance.
     */
    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Calculate #{$this->jobId} Mark of Class START \n";
        sleep(2);
        echo "Calculate #{$this->jobId} Mark of Class END \n";
    }
}

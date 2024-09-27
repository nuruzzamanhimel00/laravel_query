<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MultipleQueue implements ShouldQueue
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
        echo '#'.$this->jobId." Mail send dispatch \n";
        sleep(4);
        echo "Mail send successfully \n";
    }

    //  /**
    //  * Handle a job failure.
    //  */
    // public function failed($exception): void
    // {
    //     // Send user notification of failure, etc...
    //     Mail::send([],[], function($msg){
    //         $msg->to("admin@app.com")
    //         ->subject('Moeny transfer fail')
    //         ->html("Hi, your money trasfer fail");
    //     });
    // }
}

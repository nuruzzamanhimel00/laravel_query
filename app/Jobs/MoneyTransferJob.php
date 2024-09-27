<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MoneyTransferJob implements ShouldQueue
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

    public $amount;
    /**
     * Create a new job instance.
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // echo $this->attempts()."attement \n";
        // if($this->amount >100 ){
        if($this->amount >100 && $this->attempts() <= $this->tries){
            echo "\n if amount is gratern then 100 and atement= ".$this->attempts()."\n";
            // return
            throw new \Exception('Attempts BD'.$this->amount.' Money Transfer Fail');
        }
        echo " \n else amount is {$this->amount} atement= {$this->attempts()} is  \n";
    }

     /**
     * Handle a job failure.
     */
    public function failed($exception): void
    {
        // Send user notification of failure, etc...
        Mail::send([],[], function($msg){
            $msg->to("admin@app.com")
            ->subject('Moeny transfer fail')
            ->html("Hi, your money trasfer fail");
        });
    }
}

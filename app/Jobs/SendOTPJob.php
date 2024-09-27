<?php

namespace App\Jobs;

use App\Mail\SendOTPMail;
use Illuminate\Bus\Queueable;
use App\Mail\FormSubmitUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendOTPJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('user@app.com')->send(new SendOTPMail());
    }
}

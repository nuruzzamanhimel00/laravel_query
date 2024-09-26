<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\FormSubmitUserMail;
use App\Mail\FormSubmitAdminMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FormSubmitAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $users;
    /**
     * Create a new message instance.
     */
    public function __construct($users)
    {
        // dd($users);
        $this->users = $users;
        // dd($users);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('admin@app.com')->send(new FormSubmitAdminMail($this->users));
    }
}

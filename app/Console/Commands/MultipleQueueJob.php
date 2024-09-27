<?php

namespace App\Console\Commands;

use App\Jobs\MultipleQueue;
use Illuminate\Console\Command;

class MultipleQueueJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:multiple-queue-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $numberOfQueue = 100;
        for($i=0; $i<$numberOfQueue;$i++){
            MultipleQueue::dispatch($i);
        }

        // for($i=0; $i<$numberOfQueue;$i++){
        //     MultipleQueue::dispatch($i)->onQueue('mail');
        // }
    }
}

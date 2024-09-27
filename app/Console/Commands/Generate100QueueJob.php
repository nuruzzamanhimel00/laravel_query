<?php

namespace App\Console\Commands;

use Arr;
use App\Jobs\MoneyTransferJob;
use Illuminate\Console\Command;

class Generate100QueueJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate100-queue-job';

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
        $numberOfJobRun = 15;
        for($i=1;$i<=$numberOfJobRun;$i++){
            $amount = rand(90, 120);
            $queue = Arr::random(['default','custom'],1)[0];
            echo "BDT: ".$amount." quey:".$queue."\n";
            MoneyTransferJob::dispatch($amount)->onQueue($queue);
        }
        echo "100 job creaed";
    }
}

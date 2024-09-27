Learn url: https://www.youtube.com/watch?v=ytR5mBTuVm8&list=PLVWmHBgSb-u8slYKd7B1dM4HpGwRX6B1X&index=2

user full command for laravel query
1) making job <br>
=> php artisan make:job EmailSendJob
2) Job run <br>
=> php artisan queue:listen or php artisan queue:work
3) priority wise job run <br>
=> php artisan queue:listen --queue=heigh,default
#### Dealing With Failed Jobs ## <br>
url: https://laravel.com/docs/10.x/queues#dealing-with-failed-jobs
command: <br>
php artisan queue:failed-table
 <br>
php artisan migrate
=> code <br> 
    /**
     * Handle a job failure.
     */
    public function failed(?Throwable $exception): void
    {
        // Send user notification of failure, etc...
    }

### Retrying Failed Jobs command <br>
-> list of fail job <br>
=> $ php artisan queue:failed

-> php artisan queue:retry ce7bb17c-cdd8-41f0-a8ec-7b4fef4e5ece <br>
If necessary, you may pass multiple IDs to the command: <br>

php artisan queue:retry ce7bb17c-cdd8-41f0-a8ec-7b4fef4e5ece 91401d2c-0784-4f43-824c-34f94a33c24

->To retry all of your failed jobs, execute the queue:retry command and pass all as the ID: <br>

=>php artisan queue:retry all

->If you would like to delete a failed job, you may use the queue:forget command: <br>

=>php artisan queue:forget 91401d2c-0784-4f43-824c-34f94a33c24d br>

->To delete all of your failed jobs from the failed_jobs table, you may use the queue:flush command: <br>

=> php artisan queue:flush


############ TUT - 5 use commands #########
-> flush all queue from db  (All failed jobs deleted successfully)<br>
=>php artisan queue:flush
-> Monitor queue details<br>
=> php artisan queue:monitor custom/defalt
-> Delate all queue from db
=> php artisan queue:clear / php artisan queue:clear --queue=custom
-> Prority base queue run command <br>
=> php artisan queue:listen --queue=default,custom
-> list of fail job <br>
=> $ php artisan queue:failed
-> retry with unique key<br>
=>php artisan queue:retry ce7bb17c-cdd8-41f0-a8ec-7b4fef4e5ece <br>
->You may also retry all of the failed jobs for a particular queue:<br>
=>php artisan queue:retry --queue=name
->To retry all of your failed jobs, execute the queue:retry command and pass all as the ID: ,<br>
=>php artisan queue:retry all <br>
->If you would like to delete a failed job, you may use the queue:forget command:<br>
php artisan queue:forget 91401d2c-0784-4f43-824c-34f94a33c24d
->php artisan queue:flush (All failed jobs deleted successfully)





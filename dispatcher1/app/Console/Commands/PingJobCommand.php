<?php

namespace App\Console\Commands;

use App\Jobs\PingJob;
use App\Events\RabbitTest;
use Illuminate\Console\Command;

class PingJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        PingJob::dispatch('sourav'); // uses the RABBITMQ_QUEUE config
        // PingJob::dispatch()->onQueue('default');
        // PingJob::dispatch()->onQueue('dispatcher1app');
    }
}

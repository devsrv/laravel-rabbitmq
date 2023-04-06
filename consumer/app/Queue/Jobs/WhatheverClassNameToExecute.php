<?php

namespace App\Queue\Jobs;
use App\Queue\Jobs\AmqJobHandler;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

class WhatheverClassNameToExecute implements AmqJobHandler
{
    public function handle(BaseJob $instance, array $job_arguments_payload, array $payload)
    {
        echo 'WhatheverClassNameToExecute '. $instance->getQueue() . ' - ' .  $instance->getConnectionName();

        return;
    }
}
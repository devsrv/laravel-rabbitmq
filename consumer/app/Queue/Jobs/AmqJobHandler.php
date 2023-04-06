<?php

namespace App\Queue\Jobs;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

interface AmqJobHandler
{
    public function handle(BaseJob $instance, array $job_arguments_payload, array $payload);
}
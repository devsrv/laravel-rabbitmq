<?php

namespace App\Queue\Jobs;

use App\Queue\Jobs\AmqJobHandler;
use App\Queue\Jobs\UnhandledAmqJob;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

class RabbitMQJobRouter extends BaseJob
{
    public function fire(): void
    {
        $job_payload = $this->payload();

        $job_arguments_payload = (array) unserialize($job_payload['data']['command']);
        array_shift($job_arguments_payload);

        $target = match($this->resolveName() .':'. $this->getQueue()) {
            'App\Jobs\PingJob:dispatcher1app' => WhatheverClassNameToExecute::class,
            default => UnhandledAmqJob::class
        };

        $this->instance = $this->resolve($target);

        if($this->instance instanceof AmqJobHandler)
            $this->instance->handle($this, $job_arguments_payload, $job_payload);

        $this->delete();
    }
}

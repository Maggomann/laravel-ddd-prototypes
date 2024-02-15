<?php

namespace Business\Example\Domain\Listeners;

use Business\Example\Domain\Events\ExampleCompleted;

class SendExampleNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ExampleCompleted $event): void
    {
        //
    }
}

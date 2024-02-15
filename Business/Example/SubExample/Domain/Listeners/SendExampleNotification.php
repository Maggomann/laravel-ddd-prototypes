<?php

namespace Business\Example\SubExample\Domain\Listeners;

use Business\Example\SubExample\Domain\Events\ExampleCompleted;

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

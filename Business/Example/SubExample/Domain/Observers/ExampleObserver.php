<?php

namespace Business\Example\SubExample\Domain\Observers;

use Business\Example\SubExample\Domain\Models\Example;

class ExampleObserver
{
    /**
     * Handle the Example "created" event.
     */
    public function created(Example $example): void
    {
        //
    }

    /**
     * Handle the Example "updated" event.
     */
    public function updated(Example $example): void
    {
        //
    }

    /**
     * Handle the Example "deleted" event.
     */
    public function deleted(Example $example): void
    {
        //
    }

    /**
     * Handle the Example "restored" event.
     */
    public function restored(Example $example): void
    {
        //
    }

    /**
     * Handle the Example "force deleted" event.
     */
    public function forceDeleted(Example $example): void
    {
        //
    }
}

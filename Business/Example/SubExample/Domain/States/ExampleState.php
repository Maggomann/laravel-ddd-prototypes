<?php

namespace Business\Example\SubExample\Domain\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ExampleState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Draft::class)
            ->allowTransition(Draft::class, Pending::class)
            ->allowTransition(Pending::class, Completed::class)
            ->allowTransition(
                [
                    Draft::class,
                    Pending::class,
                ],
                Failed::class
            )
            ->registerState([
                Draft::class,
                Pending::class,
                Failed::class,
                Completed::class,
            ]);
    }
}

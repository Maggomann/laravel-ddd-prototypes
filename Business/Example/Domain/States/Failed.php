<?php

namespace Business\Example\Domain\States;

class Failed extends ExampleState
{
    public string $state = 'failed';

    public static string $name = 'failed';
}

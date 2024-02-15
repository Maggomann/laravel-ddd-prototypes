<?php

namespace Business\Example\SubExample\Domain\Actions;

use Business\Example\SubExample\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\SubExample\Domain\Models\Example;

class CreateExampleAction
{
    public function execute(ExampleDataTransferObject $exampleDataTransferObject): Example
    {
        $example = new Example();
        $example->fill($exampleDataTransferObject->toArray());
        $example->save();

        return $example;
    }
}

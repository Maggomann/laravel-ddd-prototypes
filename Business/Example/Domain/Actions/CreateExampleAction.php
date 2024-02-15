<?php

namespace Business\Example\Domain\Actions;

use Business\Example\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\Domain\Models\Example;

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

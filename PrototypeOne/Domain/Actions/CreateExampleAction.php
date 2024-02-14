<?php

namespace PrototypeOne\Domain\Actions;

use PrototypeOne\Domain\DataTransferObjects\ExampleDataTransferObject;
use PrototypeOne\Domain\Models\Example;

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

<?php

namespace PrototypeOne\Domain\Actions;

use PrototypeOne\Domain\DataTransferObjects\ExampleDataTransferObject;
use PrototypeOne\Domain\Models\Example;

class EditExampleAction
{
    public function execute(Example $example, ExampleDataTransferObject $exampleDataTransferObject): Example
    {
        $example->fill($exampleDataTransferObject->toArray());
        $example->save();

        return $example;
    }
}

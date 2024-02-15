<?php

namespace Business\Example\Domain\Actions;

use Business\Example\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\Domain\Models\Example;

class EditExampleAction
{
    public function execute(Example $example, ExampleDataTransferObject $exampleDataTransferObject): Example
    {
        $example->fill($exampleDataTransferObject->toArray());
        $example->save();

        return $example;
    }
}

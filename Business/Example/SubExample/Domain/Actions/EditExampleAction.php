<?php

namespace Business\Example\SubExample\Domain\Actions;

use Business\Example\SubExample\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\SubExample\Domain\Models\Example;

class EditExampleAction
{
    public function execute(Example $example, ExampleDataTransferObject $exampleDataTransferObject): Example
    {
        $example->fill($exampleDataTransferObject->toArray());
        $example->save();

        return $example;
    }
}

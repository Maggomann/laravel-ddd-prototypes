<?php

namespace PrototypeOne\Application\Controllers;

use App\Http\Controllers\Controller;
use PrototypeOne\Application\Requests\EditExampleRequest;
use PrototypeOne\Application\Resources\ExampleResource;
use PrototypeOne\Domain\Actions\EditExampleAction;
use PrototypeOne\Domain\DataTransferObjects\ExampleDataTransferObject;
use PrototypeOne\Domain\Models\Example;

class EditExampleController extends Controller
{
    public function __invoke(Example $example, EditExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(EditExampleAction::class)->execute($example, $exampleData);

        return ExampleResource::make($example);
    }
}

<?php

namespace PrototypeOne\Application\Controllers;

use App\Http\Controllers\Controller;
use PrototypeOne\Application\Requests\StoreExampleRequest;
use PrototypeOne\Application\Resources\ExampleResource;
use PrototypeOne\Domain\Actions\CreateExampleAction;
use PrototypeOne\Domain\DataTransferObjects\ExampleDataTransferObject;

class CreateExampleController extends Controller
{
    public function __invoke(StoreExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(CreateExampleAction::class)->execute($exampleData);

        return ExampleResource::make($example);
    }
}

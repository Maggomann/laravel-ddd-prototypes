<?php

namespace Business\Example\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\Application\Requests\StoreExampleRequest;
use Business\Example\Application\Resources\ExampleResource;
use Business\Example\Domain\Actions\CreateExampleAction;
use Business\Example\Domain\DataTransferObjects\ExampleDataTransferObject;

class CreateExampleController extends Controller
{
    public function __invoke(StoreExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(CreateExampleAction::class)->execute($exampleData);

        return ExampleResource::make($example);
    }
}

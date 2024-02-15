<?php

namespace Business\Example\SubExample\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\SubExample\Application\Requests\StoreExampleRequest;
use Business\Example\SubExample\Application\Resources\ExampleResource;
use Business\Example\SubExample\Domain\Actions\CreateExampleAction;
use Business\Example\SubExample\Domain\DataTransferObjects\ExampleDataTransferObject;

class CreateExampleController extends Controller
{
    public function __invoke(StoreExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(CreateExampleAction::class)->execute($exampleData);

        return ExampleResource::make($example);
    }
}

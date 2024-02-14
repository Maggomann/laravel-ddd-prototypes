<?php

namespace Business\Example\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\Application\Requests\EditExampleRequest;
use Business\Example\Application\Resources\ExampleResource;
use Business\Example\Domain\Actions\EditExampleAction;
use Business\Example\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\Domain\Models\Example;

class EditExampleController extends Controller
{
    public function __invoke(Example $example, EditExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(EditExampleAction::class)->execute($example, $exampleData);

        return ExampleResource::make($example);
    }
}

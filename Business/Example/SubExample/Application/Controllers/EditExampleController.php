<?php

namespace Business\Example\SubExample\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\SubExample\Application\Requests\EditExampleRequest;
use Business\Example\SubExample\Application\Resources\ExampleResource;
use Business\Example\SubExample\Domain\Actions\EditExampleAction;
use Business\Example\SubExample\Domain\DataTransferObjects\ExampleDataTransferObject;
use Business\Example\SubExample\Domain\Models\Example;

class EditExampleController extends Controller
{
    public function __invoke(Example $example, EditExampleRequest $request)
    {
        $exampleData = ExampleDataTransferObject::from($request->validated());
        $example = app(EditExampleAction::class)->execute($example, $exampleData);

        return ExampleResource::make($example);
    }
}

<?php

namespace Business\Example\SubExample\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\SubExample\Application\Resources\ExampleResource;
use Business\Example\SubExample\Domain\Models\Example;

class ViewExampleController extends Controller
{
    public function __invoke(Example $example)
    {
        return ExampleResource::make($example);
    }
}

<?php

namespace Business\Example\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\Application\Resources\ExampleResource;
use Business\Example\Domain\Models\Example;

class ViewExampleController extends Controller
{
    public function __invoke(Example $example)
    {
        return ExampleResource::make($example);
    }
}

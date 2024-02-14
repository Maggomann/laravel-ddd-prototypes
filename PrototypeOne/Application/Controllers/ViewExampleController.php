<?php

namespace PrototypeOne\Application\Controllers;

use App\Http\Controllers\Controller;
use PrototypeOne\Application\Resources\ExampleResource;
use PrototypeOne\Domain\Models\Example;

class ViewExampleController extends Controller
{
    public function __invoke(Example $example)
    {
        return ExampleResource::make($example);
    }
}

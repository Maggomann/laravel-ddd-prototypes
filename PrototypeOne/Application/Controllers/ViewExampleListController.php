<?php

namespace PrototypeOne\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use PrototypeOne\Application\Queries\ListExamplesQuery;
use PrototypeOne\Application\Resources\ExampleResource;

class ViewExampleListController extends Controller
{
    public function __invoke(ListExamplesQuery $listExamplesQuery): AnonymousResourceCollection
    {
        $listExamples = $listExamplesQuery->get();

        return ExampleResource::collection($listExamples);
    }
}

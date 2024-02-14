<?php

namespace Business\Example\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Business\Example\Application\Queries\ListExamplesQuery;
use Business\Example\Application\Resources\ExampleResource;

class ViewExampleListController extends Controller
{
    public function __invoke(ListExamplesQuery $listExamplesQuery): AnonymousResourceCollection
    {
        $listExamples = $listExamplesQuery->get();

        return ExampleResource::collection($listExamples);
    }
}

<?php

namespace Business\Example\SubExample\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Example\SubExample\Application\Queries\ListExamplesQuery;
use Business\Example\SubExample\Application\Resources\ExampleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ViewExampleListController extends Controller
{
    public function __invoke(ListExamplesQuery $listExamplesQuery): AnonymousResourceCollection
    {
        $listExamples = $listExamplesQuery->get();

        return ExampleResource::collection($listExamples);
    }
}

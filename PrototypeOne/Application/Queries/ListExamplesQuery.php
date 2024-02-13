<?php

namespace PrototypeOne\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ViewExampleListController extends Controller
{
    public function __invoke(ListExamplesQuery $listExamplesQuery): View
    {
        return view('example.list', [
            'examples' => $listExamplesQuery->cursorPaginate(10),
        ]);
    }
}

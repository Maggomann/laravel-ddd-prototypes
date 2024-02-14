<?php

namespace Business\Example\Application\Queries;

use Business\Example\Domain\Models\Example;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListExamplesQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = $this->baseQuery();

        parent::__construct($query, $request);

        $this->allowedIncludes('user');

        $this->allowedFilters(
            AllowedFilter::exact('id'),
            AllowedFilter::partial('name'),
        );
    }

    private function baseQuery(): Builder
    {
        return Example::with('user');
    }
}

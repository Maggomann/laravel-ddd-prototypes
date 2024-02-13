<?php

namespace PrototypeOne\Application\Queries;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use PrototypeOne\Domain\Models\Example;
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
        return Example::with('user')
            ->getQuery();
    }
}

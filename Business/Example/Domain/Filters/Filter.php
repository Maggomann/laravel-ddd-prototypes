<?php

namespace Business\Example\Domain\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    public function __construct(protected readonly array $ids)
    {
    }

    abstract public function handle(Builder $examples, Closure $next): Builder;
}

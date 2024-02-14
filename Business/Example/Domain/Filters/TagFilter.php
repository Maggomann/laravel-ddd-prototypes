<?php

namespace Business\Example\Domain\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class TagFilter extends Filter
{
    public function handle(Builder $examples, Closure $next): Builder
    {
        if (count($this->ids) === 0) {
            return $next($examples);
        }

        $examples->whereHas('tags', fn (Builder $tags) => $tags->whereIn('id', $this->ids));

        return $next($examples);
    }
}

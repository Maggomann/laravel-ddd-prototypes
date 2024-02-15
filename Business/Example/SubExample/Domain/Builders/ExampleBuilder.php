<?php

namespace Business\Example\SubExample\Domain\Builders;

use Business\Example\SubExample\Shared\Domain\Filters\DateFilter;
use Illuminate\Database\Eloquent\Builder;

class ExampleBuilder extends Builder
{
    public function whereCreatedAtBetween(DateFilter $dateFilter): self
    {
        return $this->whereBetween('created_at', $dateFilter->toArray());
    }
}

<?php

namespace Domain\Subscriber\ViewModels;

use Spatie\ViewModels\ViewModel;

class GetExampleModel extends ViewModel
{
    private const PER_PAGE = 20;

    public function __construct(private readonly int $currentPage)
    {
        // comin soon
    }
}

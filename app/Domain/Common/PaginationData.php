<?php

namespace App\Domain\Common;

class PaginationData
{

    public function __construct(
        public ?int $limit,
        public ?int $offset,
    )
    {
    }
}

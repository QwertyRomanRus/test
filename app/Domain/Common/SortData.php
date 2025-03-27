<?php

namespace App\Domain\Common;

class SortData
{
    public function __construct(
        public ?string $field = null,
        public ?string $direction = null,
    ) {
    }
}

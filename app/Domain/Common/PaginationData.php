<?php

namespace App\Domain\Common;

class PaginationData
{
    public const DEFAULT_LIMIT = 20;
    public const DEFAULT_OFFSET = 0;

    public int $limit;
    public int $offset;

    public function __construct(
        ?int $limit,
        ?int $offset
    )
    {
        $this->limit = $limit ?? self::DEFAULT_LIMIT;
        $this->offset = $offset ?? self::DEFAULT_OFFSET;
    }
}

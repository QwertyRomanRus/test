<?php

namespace App\Http\Common;

use App\Domain\Common\PaginationData;
use Illuminate\Http\Request;

trait HasPagination
{
    protected PaginationData $paginationData;

    public function initPagination(
        Request $request,
    ): void
    {
        $this->setPagination($request);
    }

    protected function setPagination($request): void
    {
        $this->paginationData = new PaginationData(
            limit: $request->query('limit'),
            offset: $request->query('offset'),
        );
    }

    public function getLimit(): ?int
    {
        return $this->paginationData->limit;
    }

    public function getOffset(): ?int
    {
        return $this->paginationData->offset;
    }
}

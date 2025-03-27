<?php

namespace App\Http\Common;

use App\Domain\Common\DirectionEnum;
use App\Domain\Common\SortData;
use Illuminate\Http\Request;

trait HasSort
{
    protected SortData $sortData;

    public function initSort(
        Request $request,
    ): void
    {
        $this->sortData = new SortData();
        $this->setSort($request);
    }

    protected function setSort(Request $request): void
    {
        $direction = DirectionEnum::ASC;
        $field = $request->input('sort');

        if ($field === null) {
            return;
        }

        if (str_starts_with($field, '-')) {
            $direction = DirectionEnum::DESC;
            $field = ltrim($field, '-');
        }

        $this->sortData->field = $field;
        $this->sortData->direction = $direction->value;
    }

    public function getField(): ?string
    {
        return $this->sortData->field;
    }

    public function getDirection(): ?string
    {
        return $this->sortData->direction;
    }
}

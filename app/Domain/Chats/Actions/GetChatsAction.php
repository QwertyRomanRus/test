<?php

namespace App\Domain\Chats\Actions;

use App\Domain\Chats\Models\Chat;
use App\Http\Common\HasPagination;
use App\Http\Common\HasSort;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class GetChatsAction
{
    use HasPagination;
    use HasSort;

    public function __construct(Request $request)
    {
        $this->initSort($request);
        $this->initPagination($request);
    }

    public function execute(): LengthAwarePaginator
    {
        return Chat::query()
            ->defaultSort(field: $this->getField(), direction: $this->getDirection())
            ->paginate(perPage: $this->getLimit());
    }
}

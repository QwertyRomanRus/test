<?php

namespace App\Http\ApiV1\Modules\Chats\Controllers;

use App\Domain\Chats\Actions\GetChatsAction;
use App\Http\ApiV1\Modules\Chats\Resources\ChatsResource;
use App\Http\Common\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChatsController extends Controller
{
    public function index(GetChatsAction $action): AnonymousResourceCollection
    {
        return ChatsResource::collection($action->execute());
    }
}

<?php

namespace App\Http\ApiV1\Modules\Messages\Controllers;

use App\Domain\Messages\Actions\CreateMessageAction;
use App\Http\ApiV1\Modules\Messages\Requests\CreateMessageRequest;
use App\Http\ApiV1\Modules\Messages\Resources\MessagesResource;
use App\Http\Common\Controller;

class MessagesController extends Controller
{
    public function create(CreateMessageRequest $request, CreateMessageAction $action): MessagesResource
    {
        return MessagesResource::make($action->execute($request->convertToObject()));
    }
}

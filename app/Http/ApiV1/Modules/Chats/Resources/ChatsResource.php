<?php

namespace App\Http\ApiV1\Modules\Chats\Resources;

use App\Domain\Chats\Models\Chat;
use App\Http\Common\BaseApiResource;
use Illuminate\Http\Request;

/**
 * @mixin Chat
 */
class ChatsResource extends BaseApiResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastMessage' => $this->last_message,
            'lastMessageAt' => $this->last_message_at,
            'createdTt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}

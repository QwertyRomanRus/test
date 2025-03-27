<?php

namespace App\Domain\Chats\Actions;

use App\Domain\Chats\Models\Chat;
use App\Domain\Messages\Models\Message;
use Illuminate\Support\Str;

class UpdateLastMessageChatAction
{
    public function execute(Message $message): void
    {
        $chat = Chat::query()->find($message->chat_id);
        $chat->last_message_at = now();
        $chat->last_message = Str::limit(
            value: $message->text,
            limit: Chat::MAX_LAST_MESSAGE_LENGTH,
            end: null,
        );

        $chat->save();
    }
}

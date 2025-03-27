<?php

namespace App\Domain\Messages\Observers;

use App\Domain\Chats\Actions\UpdateLastMessageChatAction;
use App\Domain\Messages\Models\Message;

class MessageObserver
{
    public function __construct(
        protected UpdateLastMessageChatAction $updateLastMessageChatAction,
    )
    {
    }

    public function saved(Message $message): void
    {
        $this->updateLastMessageChatAction->execute($message);
    }
}

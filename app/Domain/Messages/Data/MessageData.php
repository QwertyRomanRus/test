<?php

namespace App\Domain\Messages\Data;

class MessageData
{
    public function __construct(
        public int $senderId,
        public int $chatId,
        public string $text,
    )
    {
    }
}

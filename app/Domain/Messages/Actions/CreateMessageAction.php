<?php

namespace App\Domain\Messages\Actions;

use App\Domain\Messages\Data\MessageData;
use App\Domain\Messages\Models\Message;

class CreateMessageAction
{
    public function execute(MessageData $data): Message
    {
        $model = new Message();
        $model->text = $data->text;
        $model->chat_id = $data->chatId;
        $model->sender_id = $data->senderId;

        $model->save();

        return $model;
    }
}

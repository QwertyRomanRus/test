<?php

namespace App\Http\ApiV1\Modules\Messages\Requests;

use App\Domain\Messages\Data\MessageData;
use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'senderId' => ['required', 'integer'], // авторизации нет, пока отправляем вручную
            'chatId' => ['required', 'integer', 'exists:chats,id'],
            'text' => ['required', 'string'],
        ];
    }

    public function convertToObject(): MessageData
    {
        return new MessageData(
            senderId: $this->integer('senderId'),
            chatId: $this->integer('chatId'),
            text: $this->string('text'),
        );
    }
}

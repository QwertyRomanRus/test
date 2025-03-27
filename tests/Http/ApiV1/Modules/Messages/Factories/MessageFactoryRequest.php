<?php

namespace Tests\Http\ApiV1\Modules\Messages\Factories;

use App\Domain\Chats\Models\Chat;
use Tests\Http\ApiV1\Modules\Common\BaseApiFactory;

class MessageFactoryRequest extends BaseApiFactory
{
    protected function definition(): array
    {
        /** @var Chat $chat */
        $chat = Chat::factory()->create();

        return [
            'senderId' => $this->fakeModelId(),
            'chatId' => $chat->id,
            'text' => fake()->text(),
        ];
    }
}

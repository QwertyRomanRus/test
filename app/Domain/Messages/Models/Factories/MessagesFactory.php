<?php

namespace App\Domain\Messages\Models\Factories;

use App\Domain\Chats\Models\Chat;
use App\Domain\Common\BaseFactory;
use App\Domain\Common\BaseModel;
use App\Domain\Messages\Models\Message;

/**
 * @extends BaseFactory<BaseModel>
 */
class MessagesFactory extends BaseFactory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'sender_id' => $this->fakeModelId(),
            'chat_id' => Chat::factory(),
            'text' => $this->faker->text(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}

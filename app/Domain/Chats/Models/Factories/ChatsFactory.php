<?php

namespace App\Domain\Chats\Models\Factories;

use App\Domain\Chats\Models\Chat;
use App\Domain\Common\BaseFactory;
use App\Domain\Common\BaseModel;

/**
 * @extends BaseFactory<BaseModel>
 */
class ChatsFactory extends BaseFactory
{
    protected $model = Chat::class;

    public function definition(): array
    {
        $isHasLastMessage = $this->faker->boolean();

        return [
            'name' => $this->faker->words(3, true),
            'last_message' => $isHasLastMessage ? $this->faker->sentence() : null,
            'last_message_at' => $isHasLastMessage ? $this->faker->dateTime() : null,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}

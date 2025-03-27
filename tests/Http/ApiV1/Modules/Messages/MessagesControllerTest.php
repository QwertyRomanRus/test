<?php

namespace Tests\Http\ApiV1\Modules\Messages;

use App\Domain\Chats\Models\Chat;
use Illuminate\Http\Response;
use Tests\Http\ApiV1\Modules\Messages\Factories\MessageFactoryRequest;
use Tests\TestCase;

class MessagesControllerTest extends TestCase
{
//    public function test_post_api_v1_messages_201(): void
//    {
//        $text = 'some text';
//        $senderId = 1;
//        $request = MessageFactoryRequest::new()->make([
//            'text' => $text,
//            'senderId' => $senderId,
//        ]);
//
//        $this->post('/api/v1/messages', $request)
//            ->assertJsonPath('data.text', $text)
//            ->assertJsonPath('data.senderId', $senderId)
//            ->assertStatus(201);
//    }

    public function test_post_api_v1_messages_with_observer_and_chat(): void
    {
        $text100 = "Lorem upsum dolor sit amet, consectetur adipiscing elit. Proin ac metus id erat finibus tincidunt!!!";

        $textMoreThen100 = "Lorem upsum dolor sit amet, consectetur adipiscing elit. Proin ac metus id erat finibus tincidunt!!! Sed ut perspiciatis unde omnis iste natus error!!";

        /** @var Chat $chat */
        $chat = Chat::factory()->create();
        $request = MessageFactoryRequest::new()->make([
            'text' => $textMoreThen100,
            'chatId' => $chat->id,
        ]);

        $this->post('/api/v1/messages', $request);

        $this->assertDatabaseHas(Chat::class, [
            'id' => $chat->id,
            'last_message' => $text100,
            'last_message_at' => now(),
        ]);

        $chat->refresh();

        $this->assertEquals(Chat::MAX_LAST_MESSAGE_LENGTH, strlen($text100));
    }

    public function test_post_api_v1_messages_422(): void
    {
        $this->postJson('/api/v1/messages')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}

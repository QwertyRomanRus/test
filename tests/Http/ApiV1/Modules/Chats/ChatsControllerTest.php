<?php

namespace Tests\Http\ApiV1\Modules\Chats;

use App\Domain\Chats\Models\Chat;
use App\Domain\Common\PaginationData;
use Tests\TestCase;

class ChatsControllerTest extends TestCase
{
    public function test_get_api_v1_chats_200(): void
    {
        Chat::factory()
            ->count(30)
            ->create();

        $this->get('/api/v1/chats')
            ->assertJsonCount(PaginationData::DEFAULT_LIMIT, 'data')
            ->assertJsonPath('meta.last_page', 2);
    }

    public function test_get_api_v1_chats_with_limit_in_query_200(): void
    {
        $limit = 10;

        Chat::factory()
            ->count(30)
            ->create();

        $this->get('/api/v1/chats?limit=' . $limit)
            ->assertJsonCount($limit, 'data')
            ->assertJsonPath('meta.last_page', 3);
    }

    public function test_get_api_v1_chats_with_default_sort_200(): void
    {
        /** @var Chat $chat1 */
        $chat1 = Chat::factory()->create(['last_message_at' => '2025-05-05']);

        /** @var Chat $chat2 */
        $chat2 = Chat::factory()->create(['last_message_at' => '2023-03-03']);

        /** @var Chat $chat3 */
        $chat3 = Chat::factory()->create(['last_message_at' => '2024-04-04']);

        $this->get('/api/v1/chats')
            ->assertJsonPath('data.0.id', $chat1->id)
            ->assertJsonPath('data.1.id', $chat3->id)
            ->assertJsonPath('data.2.id', $chat2->id);
    }
}

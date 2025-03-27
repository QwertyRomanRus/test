<?php

namespace App\Domain\Chats\Models;

use App\Domain\Chats\Models\Factories\ChatsFactory;
use App\Domain\Common\BaseModel;
use App\Domain\Common\DirectionEnum;
use App\Domain\Messages\Models\Message;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Collection;

/**
 * @property string $name Название чата
 * @property Collection<Message>|null $messages Сообщения
 * @property string|null $last_message Последнее сообщение
 * @property CarbonInterface|null $last_message_at Время последнего сообщения
 */
class Chat extends BaseModel
{
    use HasFactory;

    protected $table = 'chats';
    protected string $defaultSortableField = 'last_message_at';
    protected string $defaultSortableDirection = DirectionEnum::DESC->value;

    public const MAX_LAST_MESSAGE_LENGTH = 100;

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    protected static function newFactory(): ChatsFactory
    {
        return ChatsFactory::new();
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}

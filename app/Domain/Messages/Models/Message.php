<?php

namespace App\Domain\Messages\Models;

use App\Domain\Chats\Models\Chat;
use App\Domain\Messages\Models\Factories\MessagesFactory;
use App\Domain\Common\BaseModel;
use App\Domain\Messages\Observers\MessageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $sender_id Id отправителя (из какого-нибудь внешнего сервиса Users)
 * @property integer $chat_id Id чата
 * @property Chat|null $chat Чат
 * @property string $text Текст сообщения
 */
#[ObservedBy(MessageObserver::class)]
class Message extends BaseModel
{
    use HasFactory;

    protected $table = 'messages';

    protected static function newFactory(): MessagesFactory
    {
        return MessagesFactory::new();
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}

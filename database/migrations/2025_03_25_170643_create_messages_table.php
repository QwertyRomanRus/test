<?php

use App\Domain\Chats\Models\Chat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->foreignIdFor(Chat::class);
            $table->string('text');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->index('sender_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

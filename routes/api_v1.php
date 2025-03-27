<?php

use App\Http\ApiV1\Modules\Chats\Controllers\ChatsController;
use App\Http\ApiV1\Modules\Messages\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

Route::get('/chats', [ChatsController::class, 'index']);
Route::post('/messages', [MessagesController::class, 'create']);

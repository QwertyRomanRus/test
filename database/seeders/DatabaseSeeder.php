<?php

namespace Database\Seeders;

use App\Domain\Chats\Models\Chat;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Chat::factory()
            ->count(100)
            ->hasMessages(rand(10, 100))
            ->create();
    }
}

<?php

namespace App\Domain\Common;

use Illuminate\Database\Eloquent\Factories\Factory;

abstract class BaseFactory extends Factory
{
    protected function fakeModelId(): int
    {
        return $this->faker->unique(maxRetries: 5)->numberBetween(1, 100000);
    }
}

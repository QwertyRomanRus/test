<?php

namespace Tests\Http\ApiV1\Modules\Common;

abstract class BaseApiFactory
{
    abstract protected function definition(): array;

    public static function new(): self
    {
        return new static();
    }

    public function make(array $params = []): array
    {
        return array_merge($this->definition(), $params);
    }

    protected function fakeModelId(): int
    {
        return fake()->unique(maxRetries: 5)->numberBetween(1, 100000);
    }

}

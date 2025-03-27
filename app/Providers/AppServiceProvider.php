<?php

namespace App\Providers;

use App\Domain\Common\BaseModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        BaseModel::preventLazyLoading(!app()->isProduction());
    }
}

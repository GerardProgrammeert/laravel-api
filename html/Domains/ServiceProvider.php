<?php

declare(strict_types=1);

namespace Domains;

use Domains\Post\Models\Post;
use Domains\Post\Observers\PostObserver;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceProvider extends SupportServiceProvider
{
    public function boot(): void
    {
        Post::observe(PostObserver::class);
    }

    public function register(): void
    {
        $this->registerServiceProviders();

        $this->guessFactoryNamesUsing();
    }

    protected function guessFactoryNamesUsing(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName): string {
            return Str::before($modelName, 'Models\\') . 'Factories\\' . class_basename($modelName) . 'Factory';
        });
    }

    protected function registerServiceProviders(): void
    {

    }


}

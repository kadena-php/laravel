<?php

namespace KadenaPhp\Laravel;

use Illuminate\Support\ServiceProvider;
use Kadena\Client;

class KadenaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kadena.php', 'kadena');

        $this->app->singleton(Pact::class, static function (): Client {
            $baseUrl = config('kadena.api.base_url');

            return new Client($baseUrl);
        });

        $this->app->alias(Client::class, 'kadena');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/kadena.php' => config_path('kadena'),
        ], 'kadena-config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Client::class,
        ];
    }
}

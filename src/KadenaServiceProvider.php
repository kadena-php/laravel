<?php declare(strict_types=1);

namespace Kadena\Laravel;

use Illuminate\Support\ServiceProvider;
use Kadena\Client;

final class KadenaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kadena.php', 'kadena');

        $this->app->singleton(Client::class, static function (): Client {
            return new Client(config('kadena.api.base_url'));
        });

        $this->app->alias(Client::class, 'kadena-client');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/kadena.php' => config_path('kadena'),
        ], 'kadena-config');
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Client::class,
        ];
    }
}

<?php declare(strict_types=1);

namespace Kadena\Laravel;

use Illuminate\Support\ServiceProvider;
use Kadena\Client;
use Kadena\Pact\CommandFactory;
use Kadena\Pact\MetadataFactory;

final class KadenaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kadena.php', 'kadena');

        $this->app->singleton(Client::class, static function (): Client {
            return new Client(config('kadena.api.base_url'));
        });
        $this->app->alias(Client::class, 'kadena-client');


        $this->app->singleton(MetadataFactory::class, static function (): MetadataFactory {
            return (new MetadataFactory())
                ->withOptions(config('kadena.meta'));
        });
        $this->app->alias(MetadataFactory::class, 'kadena-metadata');


        $this->app->singleton(CommandFactory::class, static function (): CommandFactory {
            return new CommandFactory();
        });
        $this->app->alias(CommandFactory::class, 'kadena-command');
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
            CommandFactory::class,
            MetadataFactory::class,
        ];
    }
}

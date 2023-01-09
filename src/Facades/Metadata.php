<?php declare(strict_types=1);

namespace Kadena\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Kadena\Pact\MetadataFactory;

/**
 * @method static MetadataFactory withOptions(array $options)
 * @method static \Kadena\ValueObjects\Command\Metadata make()
 */
class Metadata extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'kadena-metadata';
    }
}

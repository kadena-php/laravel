<?php declare(strict_types=1);

namespace Kadena\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Kadena\ValueObjects\Command\SignedCommand;
use Kadena\ValueObjects\Command\SignedCommandCollection;
use Kadena\ValueObjects\RequestKey\RequestKey;
use Kadena\ValueObjects\RequestKey\RequestKeyCollection;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @method static RequestKeyCollection send(SignedCommandCollection $commands)
 * @method static ResponseInterface local(SignedCommand $command)
 * @method static ResponseInterface poll(RequestKeyCollection $requestKeyCollection)
 * @method static ResponseInterface listen(RequestKey $requestKey)
 * @method static string spv(RequestKey $requestKey, string $targetChainId)
 */
class Client extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'kadena-client';
    }
}

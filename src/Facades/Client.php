<?php

namespace KadenaPhp\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Kadena\Pact\RequestKey;
use Kadena\Pact\RequestKeyCollection;
use Kadena\Pact\SignedCommand;
use Kadena\Pact\SignedCommandCollection;
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
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'kadena-client';
    }
}

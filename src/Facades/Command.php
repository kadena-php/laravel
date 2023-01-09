<?php declare(strict_types=1);

namespace Kadena\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Kadena\Pact\CommandFactory;
use Kadena\ValueObjects\Command\Metadata;
use Kadena\ValueObjects\Command\Payload\ContinuePayload;
use Kadena\ValueObjects\Command\Payload\ExecutePayload;
use Kadena\ValueObjects\Signer\Signer;
use Kadena\ValueObjects\Signer\SignerCollection;

/**
 * @method static CommandFactory load(\Kadena\ValueObjects\Command\Command $command)
 * @method static CommandFactory addSigner(Signer $signer)
 * @method static CommandFactory withMetadata(Metadata $metadata)
 * @method static CommandFactory withExecutePayload(ExecutePayload $payload)
 * @method static CommandFactory withContinuePayload(ContinuePayload $payload)
 * @method static CommandFactory withNonce(string $nonce)
 * @method static CommandFactory withNetworkId(string $networkId)
 * @method static CommandFactory withSigners(SignerCollection $signers)
 * @method static \Kadena\ValueObjects\Command\Command make()
 */
class Command extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'kadena-command';
    }
}

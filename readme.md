# Kadena Laravel Client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

This package includes a simple-to-use client to communicate with the Pact API.

> **Note:** This repository only contains the integration code of the Kadena PHP client for Laravel. If you want to use the Kadena PHP client in a framework-agnostic way, take a look at the kadena-php/client repository.


## Installation

Via Composer

``` bash
composer require kadena-php/laravel
```

You can configure the Kadena API base URL by configuring your `env`:
```dotenv
KADENA_API_BASE_URL=http://localhost:8000
```
Optionally, you can also publish the config file:
```bash
php artisan vendor:publish --tag=kadena-config
```

## Usage
For usage examples, see the [kadena-php/client](https://github.com/kadena-php/client) repository before starting to use the Laravel integration.

This package contains three convenience Facades. Their usage are largely similar to the classes documented in the client package:

### Client Facade
```
Kadena\Laravel\Facades\Client
```
Usage
```php
$response = Client::local($signedCommand);
```

### Command Facade
```
Kadena\Laravel\Facades\Command
``` 
Usage
```php
$command = Command::withExecutePayload($payload)
    ->withMetadata($metadata)
    ->make();
```
To see all options, see the Command Factory documentation in the client repository.
### Metadata Facade
```
Kadena\Laravel\Facades\Metadata
``` 
Usage
```php
$metadata = Metadata::make();
```
To see all options, see the Metadata Factory documentation in the client repository. 
When not specifying any options like the example above, the options set in the `kadena.php` config will be used.

### Config
An example of the default config:
```php
return [
    'api' => [
        'base_url' => env('KADENA_API_BASE_URL', 'http://localhost:8888'),
    ],
    'meta' => [
        'ttl' => 7200,
        'gasLimit' => 10000,
        'chainId' => '0',
        'gasPrice' => 1e-8,
        'sender' => ''
    ],
];
```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
./vendor/bin/phpunit
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security-related issues, please send an [email](mailto:hergen.dillema@gmail.com) instead of using the issue tracker.

## Credits

- [Hergen Dillema][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kadena-php/laravel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kadena-php/laravel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kadena-php/laravel
[link-downloads]: https://packagist.org/packages/kadena-php/laravel
[link-author]: https://github.com/hergend
[link-contributors]: ../../contributors

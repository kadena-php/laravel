# Kadena PHP Client

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
This repository also houses more information on the Classes used in the examples below.

### Using the Client
When using this Laravel package, you can use the `Kadena\Laravel\Facades\Client` facade. This facade uses your `env` or config configuration to set the API base URL.

The client has a few methods available,
see the [Pact API docs](https://api.chainweb.com/openapi/pact.html#tag/endpoint-local) for more information on the different use-cases
and expected responses.
#### local
Takes a single `SignedCommand` as a parameter and returns a `ResponseInterface`.
```php
$local = Client::local($signedCommand);
```
#### send
Takes a multiple `SignedCommand` wrapped in a `SignedCommandCollection` as a parameter and returns a `RequestKeyCollection`.
```php
$send = Client::send(new SignedCommandCollection($signedCommand));
```
#### listen
Takes a single `RequestKey` as a parameter and returns a `ResponseInterface`.
```php
$requestKey = $send->first(); // Get a RequestKey from the send response above
$listen = Client::single($requestKey);
```
#### poll
Takes a `RequestKeyCollection` as a parameter and returns a `ResponseInterface`.
```php
$requestKeyCollection = $send; // The send() method above returned a RequestKeyCollection
$poll = Client::poll($requestKeyCollection);
```
#### spv
Takes a `RequestKey` and a `string $targetChainId` as parameters and returns a `string`.
```php
$spv = Client::spv($requestKey, '2');
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
[ico-downloads]: https://img.shields.io/packagist/dt/hergend/kadena-php/laravel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kadena-php/laravel
[link-downloads]: https://packagist.org/packages/kadena-php/laravel
[link-author]: https://github.com/hergend
[link-contributors]: ../../contributors

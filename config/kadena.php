<?php

return [
    'api' => [
        'base_url' => env('KADENA_API_BASE_URL', 'http://localhost:8888'),
    ],
    'meta' => [
        'creationTime' => null, // Current time will be used if this is null
        'ttl' => 7200,
        'gasLimit' => 10000,
        'chainId' => '0',
        'gasPrice' => 1e-8,
        'sender' => ''
    ],
];

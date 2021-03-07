<?php

namespace App\Services;

use GuzzleHttp\Client;

class MicroCms
{
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client(
            [
                'base_uri' => 'https://lmno.microcms.io/api/v1/',
                'timeout' => 2.0,
                'headers' => ['X-API-KEY' => config('services.microcms.api_key')],
            ]
        );
    }

    public function get(string $target, array $options = [])
    {
        $response = $this->httpClient->get(
            $target,
            ['query' => $options]
        );
        $body = $response->getBody();
        if (empty($body)) {
            return null;
        }
        return json_decode($body, true);
    }
}

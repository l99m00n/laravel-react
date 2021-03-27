<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MicroCms
{
    private Client $httpClient;

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
        try {
            $response = $this->httpClient->get(
                $target,
                ['query' => $options]
            );
        } catch (GuzzleException $e) {
            error_log(__METHOD__. ' failed.');
            return null;
        }

        $body = $response->getBody();
        if (empty($body)) {
            return null;
        }

        return json_decode($body, true);
    }
}

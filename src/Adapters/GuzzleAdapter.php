<?php

namespace HandriP\Transporter\Adapters;

use HandriP\Transporter\Contracts\AbstractHttpTransport;
use GuzzleHttp\Client;

class GuzzleAdapter extends AbstractHttpTransport
{
    public function __construct(array $config = []) {
        $this->client = new Client($config);
    }

    public function sendRequest(string $method, string $path, array $data = [], bool $withJson = true)
    {
        $response = $this->client->request($method, $path, $data);

        $body = (string) $response->getBody();

        return $withJson
            ? json_decode($body, true) 
            : $body;
    }

    public function get(string $path, array $data = [], bool $withJson = true)
    {
        return $this->sendRequest('GET', $path, $data, $withJson);
    }

    public function post(string $path, array $data = []): array 
    {
        return $this->sendRequest('POST', $path, $data);
    }

    public function put(string $path, array $data = []): array
    {
        return $this->sendRequest('PUT', $path, $data);
    }

    public function patch(string $path, array $data = []): array
    {
        return $this->sendRequest('PATCH', $path, $data);
    }

    public function delete(string $path, array $data = []): array
    {
        return $this->sendRequest('DELETE', $path, $data);
    }
}
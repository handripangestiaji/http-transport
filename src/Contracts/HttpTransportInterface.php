<?php

namespace HandriP\Transporter\Contracts;

interface HttpTransportInterface 
{
    public function sendRequest(string $method, string $path, array $data = [], bool $withArray = true);
    public function get(string $path, array $data = [], bool $withArray = true);
    public function post(string $path, array $data = []) : array;
    public function put(string $path, array $data = []) : array;
    public function patch(string $path, array $data = []) : array;
    public function delete(string $path, array $data = []) : array;
}
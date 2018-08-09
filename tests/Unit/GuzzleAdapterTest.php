<?php

namespace HandriP\Transporter\Test\Unit;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use HandriP\Transporter\Adapters\GuzzleAdapter;

class GuzzleAdapterTest extends TestCase
{
    public function testGetShouldReturnArray()
    {
        $mock = new MockHandler([new Response(200, [], '[{"result": "test"}]')]);
        $handler = HandlerStack::create($mock);

        $guzzle = new GuzzleAdapter(['handler' => $handler]);

        $data = $guzzle->get('test');

        $this->assertTrue(is_array($data));
    }

    public function testGetAbleToReturnString()
    {
        $mock = new MockHandler([new Response(200, [], '[{"result": "test"}]')]);
        $handler = HandlerStack::create($mock);

        $guzzle = new GuzzleAdapter(['handler' => $handler]);
        $data = $guzzle->get('test', [], false);

        $this->assertTrue(is_string($data));
    }
}
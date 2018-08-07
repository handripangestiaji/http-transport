<?php

namespace HandriP\Transporter\Contracts;

abstract class AbstractHttpTransport implements HttpTransportInterface
{
    protected $client = null;

    public abstract function __construct(array $config = []);
}
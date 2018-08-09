# http-transport
The adapters for PHP HTTP Client 

## HTTP Transport Guzzle Adapter
--------------------------------
```php
<?php
    require __DIR__.'/vendor/autoload.php';

    use HandriP\Transporter\Adapters\GuzzleAdapter;
    use GuzzleHttp\Client;

    $client = new GuzzleAdapter(new Client(['base_uri' => 'BASE URI']));

    $getMethod = $client->get();
?>
```

> You can create your own adapter, using other http client such as Requests, Buzz, etc.
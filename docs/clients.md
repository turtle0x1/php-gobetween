**Make sure you have setup gobetweens api**

To create a client you can do:

```php
$config = [
    'verify' => false,
    'auth' => [
        'admin',
        '1111'
    ]
];
$guzzle = new GuzzleClient($config);
$adapter = new GuzzleAdapter($guzzle);
$client = new Client($adapter, "http://localhost:8888");
```

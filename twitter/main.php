<?php

$terms = urlencode($argv[1]);

$key = 'put your key here';
$token = 'put your token here';

$api = 'https://api.twitter.com/';

$credentials = base64_encode($key . ':' . $token);

$options = [
    'http' => [
        'method' => 'POST',
        'header' => implode(PHP_EOL, [
            'Authorization: Basic ' . $credentials,
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'
        ]),
        'content' => 'grant_type=client_credentials'
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($api . 'oauth2/token', false, $context);

$data = json_decode($response, true);

if (!is_array($data) || !isset($data['token_type']) || !isset($data['access_token'])) {
    die();
}

if ($data['token_type'] !== 'bearer') {
    die();
}

$bearer = $data['access_token'];

$options = [
    'http' => [
        'method' => 'GET',
        'header' => 'Authorization: Bearer ' . $bearer
    ]
];

$context = stream_context_create($options);

$query = http_build_query([
    'count' => 10,
    'result_type' => 'recent',
    'q' => $terms
]);

$response = file_get_contents($api . '1.1/search/tweets.json?' . $query, false, $context);

$data = json_decode($response, true);

foreach ($data['statuses'] as $key => $value) {
    echo $key . "\t" . $value['text'] . PHP_EOL;
}
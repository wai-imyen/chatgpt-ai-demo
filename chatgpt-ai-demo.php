<?php

require_once './load-env.php';

$openaiApiKey = getenv('OPENAI_API_KEY');
$model = getenv('OPENAI_MODEL');

$messages = [
    [
        'role' => 'user',
        'content' => 'Hellow world'
    ]
];

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $openaiApiKey
);

$data = json_encode(array(
    'model' => $model,
    'messages' => $messages
));

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

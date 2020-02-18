<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type, authorization, origin, x-requested-with');
header('Access-Control-Allow-Methods: GET');

return [
  "errnesto.webhooks.getHeader" => function($trigger, $webhook, ...$params) {
    $auth = base64_encode($webhook['username'] . ":" . $webhook['password']);
    return "Authorization: Basic $auth\r\n" .
           "Content-type: application/json\r\n";
  },
  "errnesto.webhooks.getPayload" => function($trigger, $webhook, ...$params) {
    return "";
  },
  "debug" => false
];

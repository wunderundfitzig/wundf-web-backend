<?php

$kirby->response()->json();

$json = array(
  'mail' => (string)$site->mail(),
  'phoneNumber' => (string)$site->phone_number(),
  'address' => (string)$site->address(),
  'addressURL' => (string)$site->address_url(),
);

echo json_encode($json);

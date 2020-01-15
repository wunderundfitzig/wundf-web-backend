<?php

$kirby->response()->json();

$json = array(
  'title' => (string)$page->title(),
  'image' => (string)$page->image()->url(),
  'description' => (string)$page->description(),
  'text' => (string)$page->title(),
);

echo json_encode($json);

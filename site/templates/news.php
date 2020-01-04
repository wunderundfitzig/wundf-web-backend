<?php

$kirby->response()->json();
$json = [];

$json[] = array(
  'title' => (string)$page->title(),
  'description' => (string)$page->description(),
  'image' => $page->image()->url(),
);

echo json_encode($page->content());
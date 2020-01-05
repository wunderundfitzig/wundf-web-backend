<?php

$kirby->response()->json();

$json = array(
  'content' => (string)$page->markdown_content()
);

echo json_encode($json);

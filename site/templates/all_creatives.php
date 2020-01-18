<?php

$kirby->response()->json();
$children = $page->children()->published();
$json = [];

foreach($children as $creative) {
  $json[] = array(
    'title' => (string)$creative->title(),
    'text' => (string)$creative->markdown_text(),
    'image' => getImageURL($creative->person_image())
  );
}

echo json_encode($json);

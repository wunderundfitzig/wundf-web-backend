<?php

$kirby->response()->json();
$children = $page->children()->published();
$json = [];

foreach($children as $news) {
  $json[] = array(
    'slug' => (string)$news->slug(),
    'title' => (string)$news->title(),
    'description' => (string)$news->description(),
    'linkText' => (string)$news->link_text(),
    'linkURL' => (string)$news->link_url(),
    'image' => getImageURL($news->news_image())
  );
}

echo json_encode($json);

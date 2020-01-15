<?php

$kirby->response()->json();
$id = $page->id();
$data = $pages->find($id)->children()->published();
$json = [];

foreach($data as $article) {
  $json[] = array(
    'slug' => (string)$article->slug(),
    'title' => (string)$article->title(),
    'description' => (string)$article->description(),
    'linkText' => (string)$article->link_text(),
    'linkURL' => (string)$article->link_url(),
    'image' => getImageURL($article->news_image())
  );
}

echo json_encode($json);

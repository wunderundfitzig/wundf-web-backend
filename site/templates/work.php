<?php

$kirby->response()->json();
$id = $page->id();
$data = $pages->find($id)->children()->published();
$json = [];

foreach($data as $article) {

  $json[] = array(
    'url' => (string)$article->url(),
    'slug' => (string)$article->slug(),
    'title' => (string)$article->title(),
    'image' => $article->image()->url(),
    'description' => (string)$article->description(),
  );
}

echo json_encode($json);

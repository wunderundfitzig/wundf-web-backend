<?php

$kirby->response()->json();
$id = $page->id();
$data = $pages->find($id)->children()->published();
$json = [];

foreach($data as $article) {
  $json[] = array(
    'url'   => (string)$article->url(),
    'title' => (string)$article->title(),
    'description' => (string)$article->description(),
    'link_text' => (string)$article->link_text(),
    'image' => $article->image()->url(),
  );
}

echo json_encode($json);
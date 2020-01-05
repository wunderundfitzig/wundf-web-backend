<?php

$kirby->response()->json();
$id = $page->id();
$data = $pages->find($id)->children()->published();
$json = [];

foreach($data as $article) {
  $json[] = array(
    'title' => (string)$article->title(),
    'text' => (string)$article->markdown_text(),
    'image' => $article->image()->url(),
  );
}

echo json_encode($json);

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
    'image' => getImageURL($article->top_image()),
    'teaserText' => (string)$article->teaser_text(),
    'linkText' => (string)$article->link_text()
  );
}

echo json_encode($json);

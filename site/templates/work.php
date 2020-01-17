<?php
$request = $kirby->request();

$kirby->response()->json();
$data = $request->query()->get('filter') === 'all'
  ? $page->children()->published()
  : $page->children()->listed();

$stories = [];

foreach($data as $article) {
  $stories[] = array(
    'url' => (string)$article->url(),
    'slug' => (string)$article->slug(),
    'title' => (string)$article->title(),
    'image' => getImageURL($article->cover()),
    'teaserText' => (string)$article->teaser_text(),
    'linkText' => (string)$article->link_text()
  );
}

echo json_encode($stories);

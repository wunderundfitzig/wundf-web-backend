<?php
$request = $kirby->request();

$kirby->response()->json();
$data = $request->query()->get('filter') === 'all'
  ? $page->children()->published()
  : $page->children()->listed();

$stories = [];

foreach($data as $story) {
  $stories[] = array(
    'url' => (string)$story->url(),
    'slug' => (string)$story->slug(),
    'title' => (string)$story->title(),
    'image' => getImageURL($story->cover()),
    'teaserText' => (string)$story->teaser_text(),
    'linkText' => (string)$story->link_text()
  );
}

echo json_encode($stories);

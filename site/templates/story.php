<?php

$kirby->response()->json();

$content = [];
foreach($page->main_content()->blocks() as $block):
  $type = (string)$block->type();
  switch ($type) {
    case "kirbytext":
      $content[] = array(
        'type' => 'text',
        'text' => (string)$block->content()
      );
    break;
    case "paragraph":
      $content[] = array(
        'type' => 'html',
        'text' => (string)$block->content()
      );
    break;
    case "h2":
      $content[] = array(
        'type' => 'heading',
        'level' => 2,
        'text' => (string)$block->content()
      );
    break;
    case "h3":
      $content[] = array(
        'type' => 'heading',
        'level' => 3,
        'text' => (string)$block->content()
      );
    break;
    case "image":
      $content[] = array(
        'type' => $type,
        'url' => (string)$block->attrs()->src(),
        'caption' => (string)$block->attrs()->caption(),
        'alt' => (string)$block->attrs()->alt()
      );
    break;
  }
  
endforeach;

$json = array(
  'title' => (string)$page->title(),
  'image' => getImageURL($page->top_image()),
  'teaserText' => (string)$page->teaser_text(),
  'content' => $content
);

echo json_encode($json);

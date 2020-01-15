<?php

$kirby->response()->json();

$content = [];
foreach($page->builder_content()->toBuilderBlocks() as $block):
  $type = (string)$block->_key();
  switch ($type) {
    case "text":
      $content[] = array(
        'type' => $type,
        'text' => (string)$block->text()
      );
    break;
    case "heading":
      $content[] = array(
        'type' => $type,
        'text' => (string)$block->text()
      );
    break;
    case "image":
      $content[] = array(
        'type' => $type,
        'image' => getImageURL($block->single_image())
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

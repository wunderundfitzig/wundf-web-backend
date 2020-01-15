<?php

$kirby->response()->json();

$content = [];
foreach($page->builder_content()->toBuilderBlocks() as $block):
  $type = $block->_key()->value();
  switch ($type) {
    case "text":
      $content[] = array(
        'type' => $block->_key()->value(),
        'text' => $block->text()->value()
      );
    break;
    case "heading":
      $content[] = array(
        'type' => $block->_key()->value(),
        'text' => $block->text()->value()
      );
    break;
    case "image":
      $content[] = array(
        'type' => $block->_key()->value(),
        'image' => $block->image()->toFile()->url()
      );
    break;
  }
  
endforeach;

$json = array(
  'title' => (string)$page->title(),
  'image' => (string)$page->image()->url(),
  'teaserText' => (string)$page->teaser_text(),
  'content' => $content
);

echo json_encode($json);

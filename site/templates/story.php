<?php

$kirby->response()->json();

$content = [];
$tempListPart = '';
foreach($page->main_content()->blocks() as $block):
  $type = (string)$block->type();
  switch ($type) {
    case "kirbytext":
      $content[] = array(
        'type' => 'markdown',
        'markdown' => (string)$block->content()
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
        'type' => 'image',
        'url' => (string)$block->attrs()->src(),
        'caption' => (string)$block->attrs()->caption(),
        'alt' => (string)$block->attrs()->alt()
      );
    break;
    case 'ul':
      if ($block->hasNext() && $block->next()->type() === 'ul') {
        $tempListPart .= $block->html();
        break;
      }

      $content[] = array(
        'type' => 'html',
        'html' => $tempListPart . $block->html()
      );
      $tempListPart = '';
    break;
    default:
      $content[] = array(
        'type' => 'html',
        'html' => (string)$block->html()
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

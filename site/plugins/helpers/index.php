<?php

function getImageURL($imageName) {
  $image = $imageName->toFile();
  if ($image) {
    return $image->url();
  }
  return '';
}

<?php

function getImageURL($image) {
  return $image->toFile() ? $image->toFile()->url() : '';
}

<?php

$kirby->response()->json();

$data = $page->toArray(); 
echo json_encode($data);
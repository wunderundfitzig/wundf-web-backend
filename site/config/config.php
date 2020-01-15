<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type, authorization, origin, x-requested-with');
header('Access-Control-Allow-Methods', 'GET, OPTIONS');

return [
    'debug' => true,
    'api' => false
];

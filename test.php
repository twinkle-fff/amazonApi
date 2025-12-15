<?php

use AmazonApi\Infrastructure\SpApi\CartApi\CartApi;
require_once __DIR__."/vendor/autoload.php";



$ca = new CartApi();
$file = fopen("./testAsin.csv","r");


while($line  = fgets($file)){
    $line = trim($line);
    fwrite(STDERR,$line.PHP_EOL);
    $res = $ca->getCartData($line);
    echo json_encode($res,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}

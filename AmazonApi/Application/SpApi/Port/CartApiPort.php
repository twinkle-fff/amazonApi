<?php
namespace AmazonApi\Application\SpApi\Port;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Request\GetCartRequest;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\GetCartReponse;

interface CartApiPort{
    public function getCartData(string $asin,?GetCartRequest $requestParams):GetCartReponse;
}

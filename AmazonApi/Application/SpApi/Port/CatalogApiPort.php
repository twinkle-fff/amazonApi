<?php
namespace AmazonApi\Application\SpApi\Port;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request\CatalogRequest;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\Item;
use Generator;

interface CatalogApiPort{
    public function searchByAsin(string $asin, array|CatalogRequest|null $catalogRequest = null):Item;
    public function searchByKeyword(string $keyword, array|CatalogRequest|null $catalogRequest = null):Generator;
}

<?php

use AmazonApi\Infrastructure\SpApi\CatalogApi\CatalogApi;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request\CatalogRequest;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\IncludedData;

require_once __DIR__."/vendor/autoload.php";

$CAPI = new CatalogApi();

$creq = CatalogRequest::empty();
$creq->setIncludedData(
    IncludedData::cases()
);

$rs = $CAPI->searchByKeyword("鏡餅",$creq);
foreach($rs as $r){
    die (json_encode($r,384));
}

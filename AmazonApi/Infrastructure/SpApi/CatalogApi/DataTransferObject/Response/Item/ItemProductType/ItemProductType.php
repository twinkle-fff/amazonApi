<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemProductType;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemProductType extends BaseRespopnseObject{
    public function __construct(
        public string $marketplaceId,
        public string $productType
    )
    {}
}

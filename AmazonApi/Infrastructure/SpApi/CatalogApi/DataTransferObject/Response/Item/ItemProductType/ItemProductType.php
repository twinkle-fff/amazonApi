<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemProductType;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemProductType extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param string $marketplaceId
     * @param string $productType
     */
    public function __construct(
        public string $marketplaceId,
        public string $productType
    )
    {}
}

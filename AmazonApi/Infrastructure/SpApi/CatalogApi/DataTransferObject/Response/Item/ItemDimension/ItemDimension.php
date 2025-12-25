<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimensions;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemDimension extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param string $marketplaceId
     * @param ?Dimensions $item
     * @param ?Dimensions $package
     */
    public function __construct(
        public string $marketplaceId,
        public ?Dimensions $item,
        public ?Dimensions $package
    )
    {}
}


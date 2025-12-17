<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemImagesByMarketplace;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemImagesByMarketplace\ItemImage\ItemImage;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemImagesByMarketplace extends BaseRespopnseObject{
    protected const array ARRAY_CHILD_MAP = [
        "images"=>ItemImage::class
    ];

    public function __construct(
        public string $marketplaceId,
        public array $images
    )
    {}
}

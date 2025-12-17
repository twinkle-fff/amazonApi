<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemImagesByMarketplace\ItemImage;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class ItemImage extends BaseRespopnseObject{
    public function __construct(
        public string $variant,
        public string $link,
        public int $height,
        public int $width,
    ){}
}

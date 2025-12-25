<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemImagesByMarketplace\ItemImage;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class ItemImage extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param string $variant
     * @param string $link
     * @param int $height
     * @param int $width
     */
    public function __construct(
        public string $variant,
        public string $link,
        public int $height,
        public int $width,
    ){}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemClassificationSalesRank;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemClassificationSalesRank extends BaseRespopnseObject{
    public function __construct(
        public string $classificationId,
        public string $title,
        public string $link,
        public int $rank,

    )
    {
    }
}

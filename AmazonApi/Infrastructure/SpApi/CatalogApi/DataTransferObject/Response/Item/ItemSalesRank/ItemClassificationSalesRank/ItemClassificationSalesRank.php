<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemClassificationSalesRank;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemClassificationSalesRank extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param string $classificationId
     * @param string $title
     * @param string $link
     * @param int $rank
     */
    public function __construct(
        public string $classificationId,
        public string $title,
        public string $link,
        public int $rank,

    )
    {
    }
}

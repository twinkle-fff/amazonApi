<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemDisplayGroupSalesRank;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemDisplayGroupSalesRank extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param string $websiteDisplayGroup
     * @param string $title
     * @param string $link
     * @param int $rank
     */
    public function __construct(
        public string $websiteDisplayGroup,
        public string $title,
        public string $link,
        public int $rank,
    )
    {}
}

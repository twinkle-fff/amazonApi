<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemDisplayGroupSalesRank;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemDisplayGroupSalesRank extends BaseRespopnseObject{
    public function __construct(
        public string $websiteDisplayGroup,
        public string $title,
        public string $link,
        public int $rank,
    )
    {}
}

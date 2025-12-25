<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemClassificationSalesRank\ItemClassificationSalesRank;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemDisplayGroupSalesRank\ItemDisplayGroupSalesRank;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class ItemSalesRank extends BaseRespopnseObject{
    protected const array ARRAY_CHILD_MAP = [
        "classificationRanks"=>ItemClassificationSalesRank::class,
        "displayGroupRanks"=>ItemDisplayGroupSalesRank::class
    ];

    /**
     * Summary of __construct
     * @param string $marketplaceId
     * @param ItemClassificationSalesRank[] $classificationRanks
     * @param ItemDisplayGroupSalesRank[] $displayGroupRanks
     */
    public function __construct(
        public string $marketplaceId,
        public ?array $classificationRanks,
        public ?array $displayGroupRanks
    )
    {}
}

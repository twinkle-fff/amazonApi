<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassificationsByMarketplace;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\ItemDimension;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemIdentifiersByMarketplace\ItemIdentifiersByMarketplace;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemImagesByMarketplace\ItemImagesByMarketplace;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemProductType\ItemProductType;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationshipsByMarketplace;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSalesRank\ItemSalesRank;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSummary\ItemSummary;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemVendorDetail\ItemVendorDetail;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class Item extends BaseRespopnseObject{

    public const array ARRAY_CHILD_MAP = [
        "classifications"=>ItemBrowseClassificationsByMarketplace::class,
        "dimensions"=>ItemDimension::class,
        "identifiers"=>ItemIdentifiersByMarketplace::class,
        "images"=>ItemImagesByMarketplace::class,
        "productTypes"=>ItemProductType::class,
        "relationships"=>ItemRelationshipsByMarketplace::class,
        "salesRanks"=>ItemSalesRank::class,
        "summaries"=>ItemSummary::class,
        "vendorDetails"=>ItemVendorDetail::class
    ];

    public function __construct(
        public string $asin,
        public ?array $attributes,
        public ?array $classifications,
        public ?array $dimensions,
        public ?array $identifiers,
        public ?array $images,
        public ?array $productTypes,
        public ?array $relationships,
        public ?array $salesRanks,
        public ?array $summaries,
        public ?array $vendorDetails
    )
    {}
}

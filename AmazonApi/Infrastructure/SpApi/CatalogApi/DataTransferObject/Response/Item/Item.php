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

/**
 * Catalog item entity returned by Amazon SP-API Catalog Items.
 *
 * @see https://developer-docs.amazon.com/sp-api/docs/catalog-items-api-v2022-04-01-reference
 *
 * @property-read string $asin
 * @property-read array<string, mixed>|null $attributes
 * @property-read ItemBrowseClassificationsByMarketplace[]|null $classifications
 * @property-read ItemDimension[]|null $dimensions
 * @property-read ItemIdentifiersByMarketplace[]|null $identifiers
 * @property-read ItemImagesByMarketplace[]|null $images
 * @property-read ItemProductType[]|null $productTypes
 * @property-read ItemRelationshipsByMarketplace[]|null $relationships
 * @property-read ItemSalesRank[]|null $salesRanks
 * @property-read ItemSummary[]|null $summaries
 * @property-read ItemVendorDetail[]|null $vendorDetails
 */
readonly class Item extends BaseRespopnseObject
{
    /**
     * Child DTO mapping for array properties.
     *
     * @var array<string, class-string>
     */
    public const ARRAY_CHILD_MAP = [
        'classifications' => ItemBrowseClassificationsByMarketplace::class,
        'dimensions'      => ItemDimension::class,
        'identifiers'     => ItemIdentifiersByMarketplace::class,
        'images'          => ItemImagesByMarketplace::class,
        'productTypes'    => ItemProductType::class,
        'relationships'   => ItemRelationshipsByMarketplace::class,
        'salesRanks'      => ItemSalesRank::class,
        'summaries'       => ItemSummary::class,
        'vendorDetails'   => ItemVendorDetail::class,
    ];

    /**
     * @param string $asin Amazon Standard Identification Number
     * @param array<string, mixed>|null $attributes Item attributes (structure depends on includedData/marketplace)
     * @param ItemBrowseClassificationsByMarketplace[]|null $classifications Browse classifications by marketplace
     * @param ItemDimension[]|null $dimensions Dimensions by marketplace
     * @param ItemIdentifiersByMarketplace[]|null $identifiers Identifiers by marketplace
     * @param ItemImagesByMarketplace[]|null $images Images by marketplace
     * @param ItemProductType[]|null $productTypes Product types by marketplace
     * @param ItemRelationshipsByMarketplace[]|null $relationships Relationships by marketplace
     * @param ItemSalesRank[]|null $salesRanks Sales ranks by marketplace
     * @param ItemSummary[]|null $summaries Summaries by marketplace
     * @param ItemVendorDetail[]|null $vendorDetails Vendor details by marketplace
     */
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
    ) {}
}

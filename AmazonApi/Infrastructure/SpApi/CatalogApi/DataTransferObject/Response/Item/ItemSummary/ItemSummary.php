<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSummary;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassification\ItemBrowseClassification;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSummary\ItemContributor\ItemContributor;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\ItemClassification;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
use DateTime;
/**
 * Item summary information returned by Amazon SP-API Catalog Items.
 *
 * @see https://developer-docs.amazon.com/sp-api/docs/catalog-items-api-v2022-04-01-reference
 *
 * @property-read string $marketplaceId
 * @property-read bool|null $adultProduct
 * @property-read bool|null $autographed
 * @property-read string|null $brand
 * @property-read ItemBrowseClassification|null $browseClassification
 * @property-read string|null $color
 * @property-read ItemContributor[]|null $contributors
 * @property-read ItemClassification|null $itemClassification
 * @property-read string|null $itemName
 * @property-read string|null $manufacturer
 * @property-read bool|null $memorabilia
 * @property-read string|null $modelNumber
 * @property-read int|null $packageQuantity
 * @property-read string|null $partNumber
 * @property-read DateTime|null $releaseDate
 * @property-read string|null $size
 * @property-read string|null $style
 * @property-read bool|null $tradeInEligible
 * @property-read string|null $websiteDisplayGroup
 * @property-read string|null $websiteDisplayGroupName
 */
readonly class ItemSummary extends BaseRespopnseObject
{
    /**
     * Child DTO mapping for array properties.
     *
     * @var array<string, class-string>
     */
    protected const ARRAY_CHILD_MAP = [
        'contributors' => ItemContributor::class,
    ];

    /**
     * @param string $marketplaceId Amazon marketplace identifier (e.g. ATVPDKIKX0DER)
     * @param bool|null $adultProduct Whether the item is an adult product
     * @param bool|null $autographed Whether the item is autographed
     * @param string|null $brand Brand name
     * @param ItemBrowseClassification|null $browseClassification Browse classification
     * @param string|null $color Color information
     * @param ItemContributor[]|null $contributors List of contributors
     * @param ItemClassification|null $itemClassification Item classification enum
     * @param string|null $itemName Item name / title
     * @param string|null $manufacturer Manufacturer name
     * @param bool|null $memorabilia Whether the item is memorabilia
     * @param string|null $modelNumber Model number
     * @param int|null $packageQuantity Package quantity
     * @param string|null $partNumber Part number
     * @param DateTime|null $releaseDate Release date
     * @param string|null $size Size
     * @param string|null $style Style
     * @param bool|null $tradeInEligible Trade-in eligibility
     * @param string|null $websiteDisplayGroup Website display group
     * @param string|null $websiteDisplayGroupName Website display group name
     */
    public function __construct(
        public string $marketplaceId,
        public ?bool $adultProduct,
        public ?bool $autographed,
        public ?string $brand,
        public ?ItemBrowseClassification $browseClassification,
        public ?string $color,
        public ?array $contributors,
        public ?ItemClassification $itemClassification,
        public ?string $itemName,
        public ?string $manufacturer,
        public ?bool $memorabilia,
        public ?string $modelNumber,
        public ?int $packageQuantity,
        public ?string $partNumber,
        public ?DateTime $releaseDate,
        public ?string $size,
        public ?string $style,
        public ?bool $tradeInEligible,
        public ?string $websiteDisplayGroup,
        public ?string $websiteDisplayGroupName,
    ) {}
}

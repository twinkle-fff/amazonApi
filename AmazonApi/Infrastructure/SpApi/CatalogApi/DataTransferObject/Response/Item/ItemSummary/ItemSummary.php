<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSummary;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassification\ItemBrowseClassification;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemSummary\ItemContributor\ItemContributor;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\ItemClassification;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
use DateTime;

readonly class ItemSummary extends BaseRespopnseObject{
    protected const array ARRAY_CHILD_MAP = [
        "contributors"=>ItemContributor::class
    ];

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
    )
    {}
}

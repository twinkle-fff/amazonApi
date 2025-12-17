<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassification\ItemBrowseClassification;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemBrowseClassificationsByMarketplace extends BaseRespopnseObject{

    public const array ARRAY_CHILD_MAP = [
        "classifications"=>ItemBrowseClassification::class
    ];

    public function __construct(
       public string $marketplaceId,
       public array $classifications
    )
    {}
}

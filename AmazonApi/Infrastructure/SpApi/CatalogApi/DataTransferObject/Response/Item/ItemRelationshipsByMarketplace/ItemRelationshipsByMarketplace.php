<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship\ItemRelationship;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemRelationshipsByMarketplace extends BaseRespopnseObject{

    protected const array ARRAY_CHILD_MAP = [
        "relationships"=>ItemRelationship::class
    ];

    public function __construct(
        public string $marketplaceId,
        public array $relationships,
    )
    {}
}

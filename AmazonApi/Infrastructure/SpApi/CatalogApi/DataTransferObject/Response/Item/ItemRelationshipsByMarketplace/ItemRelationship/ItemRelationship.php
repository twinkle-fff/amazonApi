<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship\ItemVariationTheme\ItemVariationTheme;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\RelationshipType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;


readonly class ItemRelationship extends BaseRespopnseObject{
    public function __construct(
        public ?array $childAsins,
        public ?array $parentAsins,
        public ?ItemVariationTheme $variationTheme,
        public ?RelationshipType $type
    )
    {}
}

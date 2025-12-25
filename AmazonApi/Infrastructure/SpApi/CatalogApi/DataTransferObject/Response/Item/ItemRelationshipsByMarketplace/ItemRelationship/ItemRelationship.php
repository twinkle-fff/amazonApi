<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship\ItemVariationTheme\ItemVariationTheme;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\RelationshipType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;


readonly class ItemRelationship extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param mixed $childAsins
     * @param mixed $parentAsins
     * @param ItemVariationTheme $variationTheme
     * @param RelationshipType $type
     */
    public function __construct(
        public ?array $childAsins,
        public ?array $parentAsins,
        public ?ItemVariationTheme $variationTheme,
        public ?RelationshipType $type
    )
    {}
}

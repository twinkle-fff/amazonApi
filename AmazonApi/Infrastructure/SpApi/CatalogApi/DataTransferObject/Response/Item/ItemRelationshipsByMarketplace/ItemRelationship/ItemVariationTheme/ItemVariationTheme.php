<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship\ItemVariationTheme;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemRelationshipsByMarketplace\ItemRelationship\ItemRelationship;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemVariationTheme extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param mixed $attributes
     * @param mixed $theme
     */
    public function __construct(
        public ?array $attributes,
        public ?string $theme
    )
    {}
}


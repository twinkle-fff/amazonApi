<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemIdentifiersByMarketplace;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemIdentifiersByMarketplace\ItemIdentifier\ItemIdentifier;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemIdentifiersByMarketplace extends BaseRespopnseObject{
    protected const array ARRAY_CHILD_MAP = [
        "identifiers"=>ItemIdentifier::class
    ];

    public function __construct(
        public string $marketplaceId,
        public array $identifiers
    )
    {}
}

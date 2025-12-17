<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemIdentifiersByMarketplace\ItemIdentifier;

use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\IdentifierType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemIdentifier extends BaseRespopnseObject{
    public function __construct(
        public IdentifierType $identifierType,
        public string $identifier
    )

    {}
}

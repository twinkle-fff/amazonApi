<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassification;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemBrowseClassification extends BaseRespopnseObject{
    public function __construct(
        public string $displayName,
        public string $classificationId,
        public ?ItemBrowseClassification $parent
    )
    {}
}


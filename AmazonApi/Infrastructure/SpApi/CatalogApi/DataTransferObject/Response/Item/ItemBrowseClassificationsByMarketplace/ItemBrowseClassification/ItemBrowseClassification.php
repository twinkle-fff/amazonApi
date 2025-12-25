<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemBrowseClassificationsByMarketplace\ItemBrowseClassification;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ItemBrowseClassification extends BaseRespopnseObject{

    /**
     * Summary of __construct
     * @param string $displayName
     * @param string $classificationId
     * @param ?ItemBrowseClassification $parent
     */
    public function __construct(
        public string $displayName,
        public string $classificationId,
        public ?ItemBrowseClassification $parent
    )
    {}
}


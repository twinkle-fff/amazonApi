<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimension;

use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\LengthUnit;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class LengthDimension extends BaseRespopnseObject{
    public function __construct(
        public LengthUnit $unit,
        public float $number
    )
    {}
}

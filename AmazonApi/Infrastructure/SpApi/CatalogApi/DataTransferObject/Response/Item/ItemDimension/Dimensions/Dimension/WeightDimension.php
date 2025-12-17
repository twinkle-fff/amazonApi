<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimension;

use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\LengthUnit;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\WeightUnit;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class WeightDimension extends BaseRespopnseObject{
    public function __construct(
        public WeightUnit $unit,
        public float $number
    )
    {}
}

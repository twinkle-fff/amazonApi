<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimension;

use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\LengthUnit;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class LengthDimension extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param LengthUnit $unit
     * @param float $number
     */
    public function __construct(
        public LengthUnit $unit,
        public float $number
    )
    {}
}

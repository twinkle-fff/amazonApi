<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimension\LengthDimension;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\ItemDimension\Dimensions\Dimension\WeightDimension;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class Dimensions extends BaseRespopnseObject{
    public function __construct(
        public LengthDimension $height,
        public LengthDimension $length,
        public LengthDimension $weight,
        public WeightDimension $width,
    )
    {}
}


<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class QuantityDiscountPrice extends BaseRespopnseObject{
    public function __construct(
        public int $quantityTier,
        public string $quantityDiscountType,
        public Price $listingPrice
    )
    {}
}

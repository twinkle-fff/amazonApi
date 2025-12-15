<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\CustomerType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class LowestPrice extends BaseRespopnseObject{
    public function __construct(
        public ListingCondition $condition,
        public string $fulfillmentChannel,
        public ?OfferType $offerType,
        public ?int $quantityTier,
        public ?string $quantityDiscountType,
        public ?Price $LandedPrice,
        public ?Price $ListingPrice,
        public ?Price $Shipping,
        public ?Point $Points

    )
    {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\AvailabilityType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\SubCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class Offer extends BaseRespopnseObject{

    protected const array ARRAY_CHILD_MAP = [
        "quantityDiscountPrices"=>QuantityDiscountPrice::class
    ];

    public function __construct(
        public ?bool $MyOffer,
        public ?OfferType $offerType,
        public SubCondition $SubCondition,
        public ?string $SellerId,
        public ?string $ConditionNotes,
        public ?SellerFeedbackRating $SellerFeedbackRating,
        public ShippingTime $ShippingTime,
        public Price $ListingPrice,
        public ?array $quantityDiscountPrices,
        public ?Point $Points,
        public Price $Shipping,
        public ?ShipsFrom $ShipsFrom,
        public ?bool $IsFulfilledByAmazon,
        public PrimeInformation $PrimeInformation,
        public ?bool $IsBuyBoxWinner,
        public ?bool $IsFeaturedMerchant
    )
    {

    }
}

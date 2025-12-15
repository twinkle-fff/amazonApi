<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\SalesRanking;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
use DateTime;

readonly class Summary extends BaseRespopnseObject{

    protected const array ARRAY_CHILD_MAP = [
        "NumberOfOffers"=>NumberOfOffers::class,
        "LowestPrices"=>LowestPrice::class,
        "BuyBoxPrices"=>BuyBoxPrice::class,
        "SalesRankings"=>SalesRanking::class,
        "BuyBoxEligibleOffers"=>BuyBoxEligibleOffers::class
    ];

    public function __construct(
        public int $TotalOfferCount,
        public ?array $NumberOfOffers,
        public ?array $LowestPrices,
        public ?array $BuyBoxPrices,
        public ?Price $ListPrice,
        public ?Price $CompetitivePriceThreshold,
        public ?Price $SuggestedLowerPricePlusShipping,
        public ?array $SalesRankings,
        public ?array $BuyBoxEligibleOffers,
        public ?DateTime $OffersAvailableTime
    )
    {}
}

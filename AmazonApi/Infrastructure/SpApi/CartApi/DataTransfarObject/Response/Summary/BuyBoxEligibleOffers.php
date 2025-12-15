<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\Enum\FullfilllmentChannel;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class BuyBoxEligibleOffers extends BaseRespopnseObject{
    public function __construct(
        public ?ListingCondition $condition,
        public ?FullfilllmentChannel $fulfillmentChannel,
        public int $OfferCount
    ){}

}

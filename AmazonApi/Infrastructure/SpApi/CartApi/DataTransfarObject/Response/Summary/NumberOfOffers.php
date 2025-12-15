<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\FullfilllmentChannel;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class NumberOfOffers extends BaseRespopnseObject{
    public function __construct(
        public ?ListingCondition $condition,
        public ?FullfilllmentChannel $fulfillmentChannel,
        public ?int $OfferCount,
    )
    {}

}

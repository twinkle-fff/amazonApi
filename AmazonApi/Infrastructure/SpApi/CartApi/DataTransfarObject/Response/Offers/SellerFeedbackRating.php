<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class SellerFeedbackRating extends BaseRespopnseObject{
    public function __construct(
        public ?float $SellerPositiveFeedbackRating,
        public int $FeedbackCount
    ){}
}

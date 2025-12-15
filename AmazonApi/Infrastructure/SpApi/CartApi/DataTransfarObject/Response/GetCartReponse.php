<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers\Offer;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers\Offers;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary\Summary;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\SubCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class GetCartReponse extends BaseRespopnseObject{

    protected const array ARRAY_CHILD_MAP = [
        "Offers" => Offer::class
    ];

    public function __construct(
        public ?string $MarketplaceID,
        public ?string $ASIN,
        public ?string $SKU,
        public ItemCondition $ItemCondition,
        public string $status,
        public Summary $Summary,
        public array $Offers,
    )
    {}

}

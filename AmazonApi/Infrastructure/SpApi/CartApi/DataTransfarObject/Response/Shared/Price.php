<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class Price extends BaseRespopnseObject{
    public function __construct(
        public ?string $CurrencyCode,
        public ?int $Amount
    )
    {

    }
}

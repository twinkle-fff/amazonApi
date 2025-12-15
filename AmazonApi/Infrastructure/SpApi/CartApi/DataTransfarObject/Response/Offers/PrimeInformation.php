<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class PrimeInformation extends BaseRespopnseObject{
    public function __construct(
        public bool $IsPrime,
        public bool $IsNationalPrime
    )
    {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\AvailabilityType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class ShippingTime extends BaseRespopnseObject{
    public function __construct(
        public ?int $minimumHours,
        public ?int $maximumHours,
        public ?string $availableDate,
        public ?AvailabilityType $availabilityType,
    )
    {

    }
}

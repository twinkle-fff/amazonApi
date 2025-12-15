<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ShipsFrom extends BaseRespopnseObject{
    public function __construct(
        public ?string $State,
        public ?string $Country
    )
    {}
}

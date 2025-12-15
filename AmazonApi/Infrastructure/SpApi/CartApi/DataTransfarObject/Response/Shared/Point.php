<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class Point extends BaseRespopnseObject {
    public function __construct(
        public ?int $PointsNumber,
        public ?Price $PointsMonetaryValue
    )
    {
    }
}

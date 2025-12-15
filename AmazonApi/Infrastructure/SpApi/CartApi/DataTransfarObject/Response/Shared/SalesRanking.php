<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class SalesRanking extends BaseRespopnseObject{
    public function __construct(
        public string $ProductCategoryId,
        public int $Rank
    )
    {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Pagenation;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class Pagenation extends BaseRespopnseObject{
    public function __construct(
        public ?string $nextToken,
        public ?string $previousToken
    )
    {}
}

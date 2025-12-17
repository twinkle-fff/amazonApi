<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\Item;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Pagenation\Pagenation;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Refinements\Refinements;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class CatalogResponse extends BaseRespopnseObject{

    public const array ARRAY_CHILD_MAP = [
        "items"=>Item::class
    ];

    /**
     * Summary of __construct
     * @param int $numberOfResults
     * @param Pagenation $pagination
     * @param Refinements $refinements
     * @param Item $items
     */
    public function __construct(
        public int $numberOfResults,
        public Pagenation $pagination,
        public Refinements $refinements,
        public array $items
    )
    {

    }
}

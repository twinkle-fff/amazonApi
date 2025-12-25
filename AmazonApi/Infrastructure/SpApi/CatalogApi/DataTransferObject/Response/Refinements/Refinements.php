<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Refinements;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class Refinements extends BaseRespopnseObject{

    public const array ARRAY_CHILD_MAP = [
        "brands"=>BrandRefinement::class,
        "classifications"=>ClassificationRefinement::class
    ];
    /**
     * Summary of __construct
     * @param BrandRefinement[] $brands
     * @param ClassificationRefinement[] $classifications
     */
    public function __construct(
        public array $brands,
        public array $classifications
    )
    {}
}

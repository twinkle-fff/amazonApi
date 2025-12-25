<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Refinements;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
readonly class BrandRefinement extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param int $numberOfResults
     * @param string $brandName
     */
    public function __construct(
        public int $numberOfResults,
        public string $brandName,
    )
    {}
}

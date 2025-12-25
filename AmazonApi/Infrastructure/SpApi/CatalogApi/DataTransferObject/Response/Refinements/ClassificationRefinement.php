<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Refinements;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

readonly class ClassificationRefinement extends BaseRespopnseObject{
    /**
     * Summary of __construct
     * @param int $numberOfResults
     * @param string $displayName
     * @param string $classificationId
     */
    public function __construct(
        public int $numberOfResults,
        public string $displayName,
        public string $classificationId
    ){}
}

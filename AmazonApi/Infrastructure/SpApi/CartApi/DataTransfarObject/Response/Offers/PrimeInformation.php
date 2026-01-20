<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class PrimeInformation
 *
 * Amazon SP-API Cart API における
 * 「Prime 対応情報」を表す DTO。
 *
 * - Prime 対象オファーかどうか
 * - 全国 Prime（National Prime）対象かどうか
 *
 * Offer DTO の一部として使用される。
 */
readonly class PrimeInformation extends BaseRespopnseObject
{
    /**
     * PrimeInformation constructor.
     *
     * @param bool $IsPrime
     *  Prime 対象オファーかどうか
     *
     * @param bool $IsNationalPrime
     *  全国 Prime（National Prime）対象かどうか。
     *  地域限定 Prime と区別するためのフラグ。
     */
    public function __construct(
        public bool $IsPrime,
        public bool $IsNationalPrime
    ) {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class QuantityDiscountPrice
 *
 * Amazon SP-API Cart API における
 * 「数量割引価格情報」を表す DTO。
 *
 * - 一定数量以上購入時に適用される価格
 * - 割引の種別
 * - 割引後の販売価格
 *
 * Offer DTO の quantityDiscountPrices 配列要素として使用される。
 */
readonly class QuantityDiscountPrice extends BaseRespopnseObject
{
    /**
     * QuantityDiscountPrice constructor.
     *
     * @param int $quantityTier
     *  割引が適用される最小購入数量
     *
     * @param string $quantityDiscountType
     *  数量割引の種別
     *  例: "QuantityDiscount"
     *
     * @param Price $listingPrice
     *  割引後の商品本体価格
     */
    public function __construct(
        public int $quantityTier,
        public string $quantityDiscountType,
        public Price $listingPrice
    ) {}
}

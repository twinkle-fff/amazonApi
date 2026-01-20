<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class LowestPrice
 *
 * Amazon SP-API Cart API における
 * 「条件別・出荷元別の最低価格情報」を表す DTO。
 *
 * - 商品コンディション（新品 / 中古など）
 * - フルフィルメントチャネル（Amazon / Merchant）
 * - オファー種別（B2C / B2B など）
 * - 数量割引条件
 * - 価格内訳（商品価格 / 送料 / 着地価格）
 * - ポイント付与情報
 *
 * Summary DTO の LowestPrices 配列要素として使用される。
 */
readonly class LowestPrice extends BaseRespopnseObject
{
    /**
     * LowestPrice constructor.
     *
     * @param ListingCondition $condition
     *  商品コンディション（New / Used / Collectible など）
     *
     * @param string $fulfillmentChannel
     *  フルフィルメントチャネル
     *  例: "Amazon"（FBA）, "Merchant"（FBM）
     *
     * @param OfferType|null $offerType
     *  オファー種別（B2C / B2B 等）
     *
     * @param int|null $quantityTier
     *  数量割引の適用単位
     *
     * @param string|null $quantityDiscountType
     *  数量割引の種別（例: "QuantityDiscount"）
     *
     * @param Price|null $LandedPrice
     *  送料込みの着地価格
     *
     * @param Price|null $ListingPrice
     *  商品本体価格
     *
     * @param Price|null $Shipping
     *  送料
     *
     * @param Point|null $Points
     *  付与ポイント情報
     */
    public function __construct(
        public ListingCondition $condition,
        public string $fulfillmentChannel,
        public ?OfferType $offerType,
        public ?int $quantityTier,
        public ?string $quantityDiscountType,
        public ?Price $LandedPrice,
        public ?Price $ListingPrice,
        public ?Price $Shipping,
        public ?Point $Points
    ) {}
}

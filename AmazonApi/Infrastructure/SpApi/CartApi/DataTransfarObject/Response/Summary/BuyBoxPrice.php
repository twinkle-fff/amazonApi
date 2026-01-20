<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class BuyBoxPrice
 *
 * Amazon SP-API Cart API における
 * 「BuyBox 価格情報（条件・数量帯・価格内訳・ポイント・セラー）」を表す DTO。
 *
 * - コンディション（新品/中古など）
 * - オファー種別（B2C/B2B 等）
 * - 数量割引条件（存在する場合）
 * - 価格内訳（商品価格 / 送料 / 着地価格）
 * - 付与ポイント情報
 * - BuyBox を獲得している（または該当する）出品者ID
 *
 * Summary DTO の BuyBoxPrices 配列要素として使用される。
 */
readonly class BuyBoxPrice extends BaseRespopnseObject
{
    /**
     * BuyBoxPrice constructor.
     *
     * @param ItemCondition $condition
     *  商品のコンディション（New / Used など）
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
     *
     * @param string|null $sellerId
     *  出品者ID（Amazonの sellerId）。レスポンス上欠損する可能性があるため nullable。
     */
    public function __construct(
        public ItemCondition $condition,
        public ?OfferType $offerType,
        public ?int $quantityTier,
        public ?string $quantityDiscountType,
        public ?Price $LandedPrice,
        public ?Price $ListingPrice,
        public ?Price $Shipping,
        public ?Point $Points,
        public ?string $sellerId
    ) {}
}

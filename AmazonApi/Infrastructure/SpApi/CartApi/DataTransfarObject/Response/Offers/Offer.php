<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Point;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\OfferType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\SubCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class Offer
 *
 * Amazon SP-API Cart API における
 * 「個別オファー（出品情報）」を表す DTO。
 *
 * - 出品者情報
 * - コンディション詳細
 * - 価格 / 送料 / ポイント
 * - 配送条件
 * - Prime / BuyBox / Featured Merchant 判定
 * - 数量割引価格
 *
 * GetCartResponse の Offers 配列要素として使用される。
 */
readonly class Offer extends BaseRespopnseObject
{
    /**
     * 配列プロパティを子 DTO にマッピングする定義。
     *
     * - quantityDiscountPrices => QuantityDiscountPrice[]
     *
     * @var array<string, class-string>
     */
    protected const array ARRAY_CHILD_MAP = [
        'quantityDiscountPrices' => QuantityDiscountPrice::class,
    ];

    /**
     * Offer constructor.
     *
     * @param bool|null $MyOffer
     *  自分（認証済みセラー）のオファーかどうか
     *
     * @param OfferType|null $offerType
     *  オファー種別（B2C / B2B 等）
     *
     * @param SubCondition $SubCondition
     *  商品の詳細コンディション（VeryGood / Acceptable など）
     *
     * @param string|null $SellerId
     *  出品者ID
     *
     * @param string|null $ConditionNotes
     *  出品者が記載したコンディション備考
     *
     * @param SellerFeedbackRating|null $SellerFeedbackRating
     *  出品者評価情報
     *
     * @param ShippingTime $ShippingTime
     *  配送日数・配送可否情報
     *
     * @param Price $ListingPrice
     *  商品本体価格
     *
     * @param QuantityDiscountPrice[]|null $quantityDiscountPrices
     *  数量割引価格情報一覧
     *
     * @param Point|null $Points
     *  付与ポイント情報
     *
     * @param Price $Shipping
     *  送料
     *
     * @param ShipsFrom|null $ShipsFrom
     *  発送元情報
     *
     * @param bool|null $IsFulfilledByAmazon
     *  Amazon フルフィルメント（FBA）かどうか
     *
     * @param PrimeInformation $PrimeInformation
     *  Prime 対応情報
     *
     * @param bool|null $IsBuyBoxWinner
     *  BuyBox を獲得しているオファーかどうか
     *
     * @param bool|null $IsFeaturedMerchant
     *  Featured Merchant に選定されているかどうか
     */
    public function __construct(
        public ?bool $MyOffer,
        public ?OfferType $offerType,
        public SubCondition $SubCondition,
        public ?string $SellerId,
        public ?string $ConditionNotes,
        public ?SellerFeedbackRating $SellerFeedbackRating,
        public ShippingTime $ShippingTime,
        public Price $ListingPrice,
        public ?array $quantityDiscountPrices,
        public ?Point $Points,
        public Price $Shipping,
        public ?ShipsFrom $ShipsFrom,
        public ?bool $IsFulfilledByAmazon,
        public PrimeInformation $PrimeInformation,
        public ?bool $IsBuyBoxWinner,
        public ?bool $IsFeaturedMerchant
    ) {}
}

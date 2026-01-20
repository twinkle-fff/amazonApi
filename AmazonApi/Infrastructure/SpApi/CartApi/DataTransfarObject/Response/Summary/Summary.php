<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\Price;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared\SalesRanking;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;
use DateTime;

/**
 * Class Summary
 *
 * Amazon SP-API Cart API における商品オファーの集約情報を表す DTO。
 *
 * - オファー総数
 * - コンディション別オファー数
 * - 最低価格 / BuyBox 価格
 * - 価格しきい値
 * - セールスランキング
 * - BuyBox 対象オファー数
 * - オファー情報の取得時刻
 *
 * 本クラスは API レスポンスを immutable（readonly）に保持することを目的とする。
 */
readonly class Summary extends BaseRespopnseObject
{
    /**
     * 配列プロパティを子 DTO にマッピングする定義。
     *
     * BaseRespopnseObject により、以下の配列は自動的に DTO 配列へ変換される。
     *
     * - NumberOfOffers => NumberOfOffers[]
     * - LowestPrices => LowestPrice[]
     * - BuyBoxPrices => BuyBoxPrice[]
     * - SalesRankings => SalesRanking[]
     * - BuyBoxEligibleOffers => BuyBoxEligibleOffers[]
     *
     * @var array<string, class-string>
     */
    protected const array ARRAY_CHILD_MAP = [
        'NumberOfOffers'       => NumberOfOffers::class,
        'LowestPrices'         => LowestPrice::class,
        'BuyBoxPrices'         => BuyBoxPrice::class,
        'SalesRankings'        => SalesRanking::class,
        'BuyBoxEligibleOffers' => BuyBoxEligibleOffers::class,
    ];

    /**
     * Summary constructor.
     *
     * @param int $TotalOfferCount
     *  全オファー数（すべてのコンディション合算）
     *
     * @param NumberOfOffers[]|null $NumberOfOffers
     *  コンディション別オファー数一覧
     *
     * @param LowestPrice[]|null $LowestPrices
     *  コンディション別最低価格一覧
     *
     * @param BuyBoxPrice[]|null $BuyBoxPrices
     *  BuyBox における価格情報
     *
     * @param Price|null $ListPrice
     *  メーカー希望小売価格（存在する場合）
     *
     * @param Price|null $CompetitivePriceThreshold
     *  競争価格しきい値
     *
     * @param Price|null $SuggestedLowerPricePlusShipping
     *  Amazon が提案する「送料込みの下限価格」
     *
     * @param SalesRanking[]|null $SalesRankings
     *  カテゴリ別セールスランキング
     *
     * @param BuyBoxEligibleOffers[]|null $BuyBoxEligibleOffers
     *  BuyBox 取得対象となるオファー数情報
     *
     * @param DateTime|null $OffersAvailableTime
     *  オファー情報が有効と判断された時刻（ISO8601）
     */
    public function __construct(
        public int $TotalOfferCount,
        public ?array $NumberOfOffers,
        public ?array $LowestPrices,
        public ?array $BuyBoxPrices,
        public ?Price $ListPrice,
        public ?Price $CompetitivePriceThreshold,
        public ?Price $SuggestedLowerPricePlusShipping,
        public ?array $SalesRankings,
        public ?array $BuyBoxEligibleOffers,
        public ?DateTime $OffersAvailableTime
    ) {}
}

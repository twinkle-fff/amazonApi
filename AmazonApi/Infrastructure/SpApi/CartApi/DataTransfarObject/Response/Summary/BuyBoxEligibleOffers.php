<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\Enum\FullfilllmentChannel;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class BuyBoxEligibleOffers
 *
 * Amazon SP-API Cart API における
 * 「BuyBox 取得対象となるオファー数」を表す DTO。
 *
 * - 商品コンディション別
 * - フルフィルメントチャネル別
 * に、BuyBox の候補となるオファー数を保持する。
 *
 * Summary DTO の BuyBoxEligibleOffers 配列要素として使用される。
 */
readonly class BuyBoxEligibleOffers extends BaseRespopnseObject
{
    /**
     * BuyBoxEligibleOffers constructor.
     *
     * @param ListingCondition|null $condition
     *  商品コンディション（New / Used / Collectible など）
     *  レスポンス上欠損する可能性があるため nullable。
     *
     * @param FullfilllmentChannel|null $fulfillmentChannel
     *  フルフィルメントチャネル（Amazon / Merchant）
     *  レスポンス上欠損する可能性があるため nullable。
     *
     * @param int $OfferCount
     *  BuyBox 取得対象となるオファー数
     */
    public function __construct(
        public ?ListingCondition $condition,
        public ?FullfilllmentChannel $fulfillmentChannel,
        public int $OfferCount
    ) {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary;

use AmazonApi\Infrastructure\SpApi\CartApi\Enum\FullfilllmentChannel;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ListingCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class NumberOfOffers
 *
 * Amazon SP-API Cart API における
 * 「条件別・出荷元別のオファー数」を表す DTO。
 *
 * - 商品コンディション（新品 / 中古など）
 * - フルフィルメントチャネル（FBA / FBM）
 * - 該当条件に一致するオファー数
 *
 * Summary DTO の配列要素として使用されることを前提とする。
 */
readonly class NumberOfOffers extends BaseRespopnseObject
{
    /**
     * NumberOfOffers constructor.
     *
     * @param ListingCondition|null $condition
     *  出品状態（New / Used / Collectible など）
     *
     * @param FullfilllmentChannel|null $fulfillmentChannel
     *  フルフィルメントチャネル（Amazon / Merchant）
     *
     * @param int|null $OfferCount
     *  指定条件に該当するオファー数
     */
    public function __construct(
        public ?ListingCondition $condition,
        public ?FullfilllmentChannel $fulfillmentChannel,
        public ?int $OfferCount,
    ) {}
}

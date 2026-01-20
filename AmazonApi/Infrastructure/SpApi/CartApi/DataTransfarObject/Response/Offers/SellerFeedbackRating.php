<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class SellerFeedbackRating
 *
 * Amazon SP-API Cart API における
 * 「出品者評価情報」を表す DTO。
 *
 * - 出品者のポジティブ評価率
 * - フィードバック件数
 *
 * Offer DTO の一部として使用される。
 */
readonly class SellerFeedbackRating extends BaseRespopnseObject
{
    /**
     * SellerFeedbackRating constructor.
     *
     * @param float|null $SellerPositiveFeedbackRating
     *  出品者のポジティブ評価率（パーセンテージ）。
     *  例: 98.5
     *
     *  Amazon レスポンス上、評価率が提供されない場合があるため nullable。
     *
     * @param int $FeedbackCount
     *  出品者に対するフィードバック件数。
     */
    public function __construct(
        public ?float $SellerPositiveFeedbackRating,
        public int $FeedbackCount
    ) {}
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class ShipsFrom
 *
 * Amazon SP-API Cart API における
 * 「発送元情報」を表す DTO。
 *
 * - 発送元の州 / 地域
 * - 発送元の国
 *
 * Offer DTO の一部として使用される。
 */
readonly class ShipsFrom extends BaseRespopnseObject
{
    /**
     * ShipsFrom constructor.
     *
     * @param string|null $State
     *  発送元の州・都道府県・地域名。
     *  Amazon レスポンス上、提供されない場合があるため nullable。
     *
     * @param string|null $Country
     *  発送元の国コード（ISO 3166-1 alpha-2 など）。
     *  例: "JP", "US"
     *
     *  レスポンスに含まれない場合は null。
     */
    public function __construct(
        public ?string $State,
        public ?string $Country
    ) {}
}

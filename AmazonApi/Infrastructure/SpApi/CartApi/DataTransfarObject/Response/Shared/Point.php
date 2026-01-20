<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class Point
 *
 * Amazon SP-API Cart API における
 * 「ポイント付与情報」を表す DTO。
 *
 * - 付与されるポイント数
 * - ポイントの金額換算値
 *
 * LowestPrice / BuyBoxPrice などの価格系 DTO から参照される。
 */
readonly class Point extends BaseRespopnseObject
{
    /**
     * Point constructor.
     *
     * @param int|null $PointsNumber
     *  付与されるポイント数。
     *  ポイント付与がない場合やレスポンスに含まれない場合は null。
     *
     * @param Price|null $PointsMonetaryValue
     *  ポイントの金額換算値。
     *  Amazon 側で金額表現が提供されない場合は null。
     */
    public function __construct(
        public ?int $PointsNumber,
        public ?Price $PointsMonetaryValue
    ) {}
}

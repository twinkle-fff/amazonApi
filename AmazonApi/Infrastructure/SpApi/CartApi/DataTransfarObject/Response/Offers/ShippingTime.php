<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers;

use AmazonApi\Infrastructure\SpApi\CartApi\Enum\AvailabilityType;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class ShippingTime
 *
 * Amazon SP-API Cart API における
 * 「配送可能時間・配送可否情報」を表す DTO。
 *
 * - 最短／最長配送時間（時間単位）
 * - 配送可能日（ISO8601 文字列）
 * - 在庫・配送可否の状態
 *
 * Offer DTO の配送条件を構成する要素として使用される。
 */
readonly class ShippingTime extends BaseRespopnseObject
{
    /**
     * ShippingTime constructor.
     *
     * @param int|null $minimumHours
     *  配送までの最短時間（時間単位）。
     *  情報が提供されない場合は null。
     *
     * @param int|null $maximumHours
     *  配送までの最長時間（時間単位）。
     *  情報が提供されない場合は null。
     *
     * @param string|null $availableDate
     *  配送可能日（ISO8601 形式の日時文字列）。
     *  例: "2026-01-20T00:00:00Z"
     *
     * @param AvailabilityType|null $availabilityType
     *  配送可否・在庫状況の種別。
     *  例: NOW, FUTURE_WITHOUT_DATE, FUTURE_WITH_DATE, NOT_AVAILABLE
     */
    public function __construct(
        public ?int $minimumHours,
        public ?int $maximumHours,
        public ?string $availableDate,
        public ?AvailabilityType $availabilityType
    ) {}
}

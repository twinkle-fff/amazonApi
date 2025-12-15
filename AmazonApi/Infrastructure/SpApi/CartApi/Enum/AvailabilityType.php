<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\Enum;

/**
 * 商品の出荷可否・出荷時期を表す Enum
 *
 * Amazon SP-API における availabilityType の値に対応する。
 *
 * 値の意味:
 * - NOW
 *   商品は現在すぐに出荷可能
 *
 * - FUTURE_WITHOUT_DATE
 *   将来出荷予定だが、具体的な日付は未定
 *
 * - FUTURE_WITH_DATE
 *   将来出荷予定で、出荷可能日が確定している
 *
 * @see https://developer-docs.amazon.com/sp-api/docs
 */
enum AvailabilityType: string
{
    /** The item is available for shipping now. */
    case NOW = 'NOW';

    /** The item will be available for shipping on an unknown date in the future. */
    case FUTURE_WITHOUT_DATE = 'FUTURE_WITHOUT_DATE';

    /** The item will be available for shipping on a known date in the future. */
    case FUTURE_WITH_DATE = 'FUTURE_WITH_DATE';
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\Enum;

/**
 * 商品のサブコンディション（詳細な状態）を表す Enum
 *
 * Amazon SP-API における subCondition の値に対応する。
 *
 * 定義されている値:
 * - New
 * - Mint
 * - Very Good
 * - Good
 * - Acceptable
 * - Poor
 * - Club
 * - OEM
 * - Warranty
 * - Refurbished Warranty
 * - Refurbished
 * - Open Box
 * - Other
 *
 * @see https://developer-docs.amazon.com/sp-api/docs
 */
enum SubCondition: string
{
    /** 新品 */
    case NEW = 'new';

    /** ほぼ新品（ミントコンディション） */
    case MINT = 'mint';

    /** 非常に良い */
    case VERY_GOOD = 'very good';

    /** 良い */
    case GOOD = 'good';

    /** 可 */
    case ACCEPTABLE = 'acceptable';

    /** 状態が悪い */
    case POOR = 'poor';

    /** クラブ商品 */
    case CLUB = 'club';

    /** OEM品 */
    case OEM = 'oem';

    /** 保証付き */
    case WARRANTY = 'warranty';

    /** 再生品（保証付き） */
    case REFURBISHED_WARRANTY = 'refurbished warranty';

    /** 再生品 */
    case REFURBISHED = 'refurbished';

    /** 開封済み未使用品 */
    case OPEN_BOX = 'open box';

    /** その他 */
    case OTHER = 'other';
}

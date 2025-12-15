<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\Enum;

/**
 * 商品のコンディション（状態）を表す Enum
 *
 * Amazon SP-API における itemCondition の値に対応する。
 *
 * @see https://developer-docs.amazon.com/sp-api/docs
 */
enum ItemCondition: string
{
    /** 新品 */
    case NEW = 'New';

    /** 中古品 */
    case USED = 'Used';

    /** コレクターズアイテム */
    case COLLECTIBLE = 'Collectible';

    /** 再生品・整備済み品 */
    case REFURBISHED = 'Refurbished';

    /**
     * クラブ商品（※Amazon公式仕様外・社内拡張用）
     *
     * SP-API 標準では定義されていないため、
     * 利用箇所を限定すること。
     */
    case CLUB = 'CLUB';
}

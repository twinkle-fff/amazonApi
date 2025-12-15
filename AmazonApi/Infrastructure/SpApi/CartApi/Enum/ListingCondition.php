<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\Enum;

/**
 * 商品コンディション（小文字表記用）
 *
 * - tryFrom() 前提で使用する Enum
 * - レスポンスや内部処理で smallcase が返ってくるケースに対応
 *
 * ItemCondition（Amazon公式表記）とは用途を分けること。
 */
enum ListingCondition: string
{
    case NEW = 'new';
    case USED = 'used';
    case COLLECTIBLE = 'collectible';
    case REFURBISHED = 'refurbished';
    case CLUB = 'club';
}

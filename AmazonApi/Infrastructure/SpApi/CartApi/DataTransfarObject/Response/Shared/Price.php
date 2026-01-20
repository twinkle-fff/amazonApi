<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class Price
 *
 * Amazon SP-API Cart API における
 * 「金額情報」を表す共通 DTO。
 *
 * - 通貨コード
 * - 金額（最小通貨単位）
 *
 * LowestPrice / BuyBoxPrice / Point など、
 * すべての価格系レスポンスで再利用される。
 */
readonly class Price extends BaseRespopnseObject
{
    /**
     * Price constructor.
     *
     * @param string|null $CurrencyCode
     *  通貨コード（ISO 4217）
     *  例: "JPY", "USD"
     *
     * @param int|null $Amount
     *  金額（最小通貨単位）。
     *  - JPY: 円
     *  - USD: セント
     *
     *  レスポンスに含まれない場合は null。
     */
    public function __construct(
        public ?string $CurrencyCode,
        public ?int $Amount
    ) {}
}

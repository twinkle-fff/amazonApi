<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Shared;

use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class SalesRanking
 *
 * Amazon SP-API Cart API における
 * 「商品カテゴリ別セールスランキング情報」を表す DTO。
 *
 * - カテゴリID
 * - そのカテゴリ内での順位
 *
 * Summary DTO から参照され、複数カテゴリ分のランキング情報を保持する。
 */
readonly class SalesRanking extends BaseRespopnseObject
{
    /**
     * SalesRanking constructor.
     *
     * @param string $ProductCategoryId
     *  商品カテゴリID（Amazon 定義のカテゴリ識別子）
     *
     * @param int $Rank
     *  該当カテゴリ内でのセールスランキング順位（1 が最上位）
     */
    public function __construct(
        public string $ProductCategoryId,
        public int $Rank
    ) {}
}

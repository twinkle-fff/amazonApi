<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response;

use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Offers\Offer;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\Summary\Summary;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use AmazonApi\Infrastructure\SpApi\Shared\DataTransfarObject\BaseRespopnseObject;

/**
 * Class GetCartReponse
 *
 * Amazon SP-API Cart API の GetCart レスポンスを表す DTO。
 *
 * - Cart に追加された ASIN / SKU の状態
 * - 商品のコンディション
 * - オファー一覧（Offers）
 * - 集約情報（Summary）
 *
 * 本 DTO は API レスポンスを **immutable（readonly）** に保持することを目的とする。
 *
 * @package AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response
 */
readonly class GetCartReponse extends BaseRespopnseObject
{
    /**
     * 配列プロパティを子 DTO にマッピングする定義
     *
     * BaseRespopnseObject により、
     * - Offers => Offer DTO の配列
     * として自動変換される。
     *
     * @var array<string, class-string>
     */
    protected const array ARRAY_CHILD_MAP = [
        'Offers' => Offer::class,
    ];

    /**
     * GetCartReponse constructor.
     *
     * @param string|null $MarketplaceID
     *  マーケットプレイスID（例: A1VC38T7YXB528 / JP）
     *
     * @param string|null $ASIN
     *  Amazon Standard Identification Number
     *
     * @param string|null $SKU
     *  出品者SKU
     *
     * @param ItemCondition $ItemCondition
     *  商品のコンディション（New / Used など）
     *
     * @param string $status
     *  カート操作の結果ステータス（例: SUCCESS / FAILURE）
     *
     * @param Summary $Summary
     *  カート全体の集約情報
     *
     * @param Offer[] $Offers
     *  カート内商品のオファー一覧
     */
    public function __construct(
        public ?string $MarketplaceID,
        public ?string $ASIN,
        public ?string $SKU,
        public ItemCondition $ItemCondition,
        public string $status,
        public Summary $Summary,
        public array $Offers,
    ) {}
}

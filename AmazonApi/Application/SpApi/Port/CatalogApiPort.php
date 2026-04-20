<?php
namespace AmazonApi\Application\SpApi\Port;

use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request\CatalogRequest;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\CatalogResponse;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\Item;
use Generator;

/**
 * Catalog API へのアクセスを抽象化したポートインターフェース
 *
 * 本インターフェースは、Amazon SP-API の Catalog Items API に対する
 * 取得処理をアプリケーション層から切り離すことを目的とする。
 *
 * 実装は Infrastructure 層に配置し、API仕様変更や実装差し替えに対して
 * 影響を局所化する。
 */
interface CatalogApiPort
{
    /**
     * ASINを指定して商品情報を取得する
     *
     * 単一のASINに対してCatalog情報を取得する。
     * 主に商品詳細や親子関係（relationships）の取得に利用する。
     *
     * @param string $asin 取得対象のASIN
     * @param CatalogRequest|array|null $catalogRequest リクエストオプション（includedData等）
     * @return Item 商品情報DTO
     */
    public function searchByAsin(
        string $asin,
        array|CatalogRequest|null $catalogRequest = null
    ): Item;

    /**
     * 複数ASINをまとめて検索する（バッチ取得）
     *
     * 最大20件程度のASINをまとめて検索する用途を想定。
     * 個別リクエストの回数削減を目的とする。
     *
     * @param string[] $asins 検索対象のASIN配列
     * @param CatalogRequest|array|null $catalogRequest リクエストオプション
     * @return CatalogResponse 検索結果（複数Itemを内包）
     */
    public function batchSearchByAsins(
        array $asins,
        array|CatalogRequest|null $catalogRequest = null
    ): CatalogResponse;

    /**
     * キーワード検索による商品取得
     *
     * ページングを伴うため、Generatorで逐次取得する。
     * 呼び出し側は foreach 等で順次処理することを想定。
     *
     * @param string $keyword 検索キーワード
     * @param CatalogRequest|array|null $catalogRequest リクエストオプション
     * @return Generator<Item> 商品情報DTOのストリーム
     */
    public function searchByKeyword(
        string $keyword,
        array|CatalogRequest|null $catalogRequest = null
    ): Generator;
}

<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi;

use AmazonApi\Application\SpApi\Port\CatalogApiPort;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request\CatalogRequest;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\CatalogResponse;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\Item;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\IdentifierType;
use AmazonApi\Infrastructure\SpApi\Shared\SpApiClient;
use Exception;
use Generator;
use HttpClient\Infrastructure\ValueObject\HttpParams;
use LogicException;

/**
 * Amazon SP-API Catalog Items API の実装クラス
 *
 * ASIN検索、複数ASIN検索、キーワード検索を提供する。
 * Application層の CatalogApiPort を実装し、
 * 実際のHTTP通信およびDTO変換を担当する。
 */
class CatalogApi implements CatalogApiPort{
    private SpApiClient $client;
    private const string CATALOG_API_ENDPOINT = "/catalog/2022-04-01/items/";
    private const string ASIN_REGEX = "/^B0[A-Z0-9]{8}$/";

    /**
     * @param SpApiClient|null $client SP-API通信用クライアント
     */
    public function __construct(?SpApiClient $client = null)
    {
        $this->client = $client ?? new SpApiClient();
    }

    /**
     * キーワード検索で商品を逐次取得する
     *
     * ページングを考慮し、GeneratorでItemを順次返す。
     *
     * @param string $keyword 検索キーワード
     * @param CatalogRequest|array|null $catalogRequest Catalog API検索条件
     * @return Generator<Item>
     * @throws Exception
     */
    public function searchByKeyword(string $keyword, array|CatalogRequest|null $catalogRequest = null): Generator
    {
        $nextToken = null;
        do{
            $response = $this->searchByKeyWordSinglePage($keyword,$catalogRequest, $nextToken);
            $nextToken = $response->pagination->nextToken ?? null;
            $items = $response->items;
            foreach($items as $item){
                yield $item;
            }
        }while(False);
        throw new Exception('Not implemented');
    }

    /**
     * 複数ASINをまとめて検索する
     *
     * 無効なASINは除外し、最大20件までを対象とする。
     *
     * @param string[] $asins ASIN配列
     * @param CatalogRequest|array|null $catalogRequest Catalog API検索条件
     * @return CatalogResponse
     */
    public function batchSearchByAsins(array $asins, array|CatalogRequest|null $catalogRequest = null): CatalogResponse{
        $normalizedCatalogRequest = $this->buildCatalogRequest($catalogRequest);
        $normalizedCatalogRequest->setIdentifiersType(IdentifierType::ASIN);
        $normalizedAsins = $this->normarizeAsins($asins);
        $normalizedCatalogRequest->setIdentifiers($normalizedAsins);
        $normalizedHttpParams = $this->buildNormalizedHttpParams($normalizedCatalogRequest);
        $response = $this->client->request(
            self::CATALOG_API_ENDPOINT,
            $normalizedHttpParams
        );
        return CatalogResponse::fromResponse($response);
    }

    /**
     * 単一ASINの商品情報を取得する
     *
     * @param string $asin 検索対象ASIN
     * @param CatalogRequest|array|null $catalogRequest Catalog API検索条件
     * @return Item
     */
    public function searchByAsin(string $asin, array|CatalogRequest|null $catalogRequest = null): Item{
        $normalizedCatalogRequest = $this->buildCatalogRequest($catalogRequest);
        $normalizedHttpParams = $this->buildNormalizedHttpParams($normalizedCatalogRequest);
        $url = $this->buildAsinURL($asin);
        $resp = $this->client->request(
            $url,
            $normalizedHttpParams,
        );
        return Item::fromResponse($resp);
    }

    /**
     * キーワード検索の1ページ分を取得する
     *
     * @param string $keyword 検索キーワード
     * @param CatalogRequest|array|null $catalogRequest Catalog API検索条件
     * @param string|null $pageToken 次ページ取得用トークン
     * @return CatalogResponse
     */
    private function searchByKeyWordSinglePage(
        string $keyword,
        array|CatalogRequest|null $catalogRequest = null,
        ?string $pageToken = null
    ): CatalogResponse{
        $normalizedCatalogRequest = $this->buildCatalogRequest($catalogRequest);
        $normalizedCatalogRequest->setKeyword($keyword);
        if($pageToken !== null){
            $normalizedCatalogRequest->setPageToken($pageToken);
        }
        $normalizedHttpParams = $this->buildNormalizedHttpParams($normalizedCatalogRequest);
        $response = $this->client->request(
            self::CATALOG_API_ENDPOINT,
            $normalizedHttpParams
        );
        return CatalogResponse::fromResponse($response);
    }

    /**
     * ASIN検索用のエンドポイントURLを生成する
     *
     * @param string $asin 検索対象ASIN
     * @return string
     */
    private function buildAsinURL(string $asin): string{
        return self::CATALOG_API_ENDPOINT . $asin;
    }

    /**
     * CatalogRequest を正規化する
     *
     * null の場合は空リクエストを生成し、
     * 配列の場合は CatalogRequest に変換する。
     *
     * @param CatalogRequest|array|null $catalogRequest
     * @return CatalogRequest
     */
    private function buildCatalogRequest(array|CatalogRequest|null $catalogRequest = null): CatalogRequest{
        if($catalogRequest === null){
            $catalogRequest = CatalogRequest::empty();
        }elseif(is_array($catalogRequest)){
            $catalogRequest = CatalogRequest::fromArray($catalogRequest);
        }

        return $catalogRequest;
    }

    /**
     * CatalogRequest から HTTPパラメータを生成する
     *
     * @param CatalogRequest $normalizedCatalogRequest
     * @return HttpParams
     */
    private function buildNormalizedHttpParams(CatalogRequest $normalizedCatalogRequest): HttpParams{
        $arrayParams = $normalizedCatalogRequest->toArray();
        return HttpParams::fromArray($arrayParams);
    }

    /**
     * ASIN配列を正規化する
     *
     * 正規表現に一致しない値は除外し、
     * 最大20件までに制限する。
     *
     * @param array $asins
     * @return string[]
     */
    private function normarizeAsins(array $asins): array{
        $normalizedAsins = [];
        foreach($asins as $asin){
            if(preg_match(self::ASIN_REGEX, $asin) == false){
                continue;
            }
            $normalizedAsins[] = $asin;
            if (count($normalizedAsins) > 19){
                break;
            }
        }
        return $normalizedAsins;
    }
}

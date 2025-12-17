<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi;

use AmazonApi\Application\SpApi\Port\CatalogApiPort;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request\CatalogRequest;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\CatalogResponse;
use AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Response\Item\Item;
use AmazonApi\Infrastructure\SpApi\Shared\SpApiClient;
use Exception;
use Generator;
use HttpClient\Infrastructure\ValueObject\HttpParams;

class CatalogApi implements CatalogApiPort{
    private SpApiClient $client;
    private const string CATALOG_API_ENDPOINT = "/catalog/2022-04-01/items/";
    public function __construct(?SpApiClient $client = null)
    {
        $this->client = $client ?? new SpApiClient();
    }

    public function searchByKeyword(string $keyword, array|CatalogRequest|null $catalogRequest = null): Generator
    {
        $nextToken = null;
        do{
            $response = $this->searchByKeyWordSinglePage($keyword, $nextToken);
            $nextToken = $response->pagination->nextToken ?? null;
            $items = $response->items;
            foreach($items as $item){
                yield $item;
            }
        }while(False);
        throw new Exception('Not implemented');
    }



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

    private function searchByKeyWordSinglePage(string $keyword, array|CatalogRequest|null $catalogRequest = null, ?string $pageToken = null): CatalogResponse{
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

    private function buildAsinURL(string $asin){
        return self::CATALOG_API_ENDPOINT.$asin;
    }

    private function buildCatalogRequest(array|CatalogRequest|null $catalogRequest = null): CatalogRequest{
        if($catalogRequest === null){
            $catalogRequest = CatalogRequest::empty();
        }elseif(is_array($catalogRequest)){
            $catalogRequest = CatalogRequest::fromArray($catalogRequest);
        }

        return $catalogRequest;
    }

    private function buildNormalizedHttpParams(CatalogRequest $normalizedCatalogRequest){
        $arrayParams = $normalizedCatalogRequest->toArray();
        return HttpParams::fromArray($arrayParams);
    }
}


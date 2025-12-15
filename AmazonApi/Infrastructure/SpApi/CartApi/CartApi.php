<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi;

use AmazonApi\Application\SpApi\Port\CartApiPort;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Request\GetCartRequest;
use AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Response\GetCartReponse;
use AmazonApi\Infrastructure\SpApi\Shared\SpApiClient;
use Exception;
use HttpClient\Infrastructure\ValueObject\HttpParams;

class CartApi implements CartApiPort{
    private SpApiClient $client;
    private const string ENDPOINT_PREFIX = "/products/pricing/v0/items/{Asin}/offers";

    public function __construct(?SpApiClient $client = null)
    {
        $client ??= new SpApiClient();
        $this->client = $client;
    }

    public function getCartData(string $asin, array|GetCartRequest|null $requestParams = null): GetCartReponse
    {
        $url = $this->buildURL($asin);
        $normalizedParams = $this->buildParam($requestParams);
        $response = $this->client->request(
            $url,$normalizedParams
        );

        return GetCartReponse::fromResponse($response["payload"]);
    }

    private function buildURL(string $asin){
        return str_replace("{Asin}",$asin,self::ENDPOINT_PREFIX);
    }

    private function buildParam(array|GetCartRequest|null $requestParams){
        if($requestParams === null){
            $requestParams = new GetCartRequest();
        }
        if(is_array($requestParams)){
            $requestParams = GetCartRequest::fromArray($requestParams);
        }

        /** @var GetCartRequest $requestParams */
        $normalizedParams = HttpParams::fromArray($requestParams->toArray());
        return $normalizedParams;
    }
}


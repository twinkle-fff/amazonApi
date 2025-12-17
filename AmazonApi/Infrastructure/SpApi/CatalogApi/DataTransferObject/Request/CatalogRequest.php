<?php

namespace AmazonApi\Infrastructure\SpApi\CatalogApi\DataTransferObject\Request;

use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\IdentifierType;
use AmazonApi\Infrastructure\SpApi\CatalogApi\Enum\IncludedData;

/**
 * @method self setIdentifiers(?array $identifiers) identifiersを設定
 * @method self setIdentifiersType(IdentifierType|string|null $identifiersType) identifiersTypeを設定
 * @method self setMarketplaceIds(?string $marketplaceIds) marketplaceIdsを設定
 * @method self setIncludedData(IncludedData[]|string[]|string|null $includedData) includedDataを設定
 * @method self setLocale(?string $locale) localeを設定
 * @method self setSellerId(?string $sellerId) sellerIdを設定
 * @method self setKeywords(array|string|null $keywords) keywordsを設定
 * @method self setBrandNames(array|string|null $brandNames) brandNamesを設定
 * @method self setClassificationIds(array|string|null $classificationIds) classificationIdsを設定
 * @method self setKeywordsLocale(?string $keywordsLocale) keywordsLocaleを設定
 * @method self setPageSize(int $pageSize) pageSizeを設定
 * @method self setPageToken(?string $pageToken) pageTokenを設定
 */
class CatalogRequest
{
    private const string JP_MARKET_PLACE_ID = 'A1VC38T7YXB528';

    /**
     * Summary of __construct
     * @param array|null $identifiers
     * @param IdentifierType|string|null $identifiersType
     * @param mixed $marketplaceIds
     * @param IncludedData[] $includedData
     * @param string|null $locale
     * @param string|null $sellerId
     * @param array|string|null $keywords
     * @param array|string|null $brandNames
     * @param array|string|null $classificationIds
     * @param string|null $keywordsLocale
     * @param int $pageSize
     * @param string|null $pageToken
     */
    public function __construct(
        public ?array $identifiers = null,
        public IdentifierType|string|null $identifiersType = null,
        public ?string $marketplaceIds = null,
        public ?array $includedData = null,
        public ?string $locale = null,
        public ?string $sellerId = null,
        public array|string|null $keywords = null,
        public array|string|null $brandNames = null,
        public array|string|null $classificationIds = null,
        public ?string $keywordsLocale = null,
        public ?string $pageToken = null,
        public int $pageSize = 20,
    ) {}

    public static function empty(): self
    {
        return new self(
            identifiers: null,
            identifiersType: null,
            marketplaceIds: null,
            includedData: null,
            locale: null,
            sellerId: null,
            keywords: null,
            brandNames: null,
            classificationIds: null,
            keywordsLocale: null,
            pageToken: null,
            pageSize: 20,
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            identifiers: self::explodeComma($data['identifiers'] ?? null),
            identifiersType: self::denormalizeIdentifierType($data['identifiersType'] ?? null),
            marketplaceIds: $data['marketplaceIds'] ?? null,
            includedData: self::denormalizeIncludedData($data['includedData'] ?? null),
            locale: $data['locale'] ?? null,
            sellerId: $data['sellerId'] ?? null,
            keywords: self::explodeComma($data['keywords'] ?? null),
            brandNames: self::explodeComma($data['brandNames'] ?? null),
            classificationIds: self::explodeComma($data['classificationIds'] ?? null),
            keywordsLocale: $data['keywordsLocale'] ?? null,
            pageToken: $data['pageToken'] ?? null,
            pageSize: isset($data['pageSize']) ? (int) $data['pageSize'] : 20,
        );
    }

    public function setAsin(string $asin): self
    {
        $asin = strtoupper(trim($asin));

        $this->identifiersType = IdentifierType::ASIN;
        $this->identifiers = [$asin];

        // ASIN検索に寄せるのでキーワード系はリセット
        $this->keywords = null;
        // 必要ならこちらもリセットしたいなら解除してOK
        // $this->brandNames = null;
        // $this->classificationIds = null;

        return $this;
    }

    public function setKeyword(string|array $keyword): self
    {
        $this->keywords = $keyword;

        // keyword検索に寄せるのでidentifier系はリセット
        $this->identifiersType = null;
        $this->identifiers = null;

        return $this;
    }

    public function toArray(): array
    {
        $params = [
            'identifiers'        => $this->implodeComma($this->identifiers),
            'identifiersType'    => $this->normalizeEnum($this->identifiersType),
            'marketplaceIds'     => $this->marketplaceIds ?? self::JP_MARKET_PLACE_ID,
            'includedData'       => $this->implodeIncludedData($this->includedData),
            'locale'             => $this->locale,
            'sellerId'           => $this->sellerId,
            'keywords'           => $this->implodeComma($this->keywords),
            'brandNames'         => $this->implodeComma($this->brandNames),
            'classificationIds'  => $this->implodeComma($this->classificationIds),
            'keywordsLocale'     => $this->keywordsLocale,
            'pageSize'           => $this->pageSize,
            'pageToken'          => $this->pageToken,
        ];

        return array_filter(
            $params,
            static fn($value) => $value !== null
        );
    }

    private function normalizeEnum(IdentifierType|string|null $value): ?string
    {
        return $value instanceof IdentifierType ? $value->value : $value;
    }

    private function implodeIncludedData(?array $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $normalized = array_map(
            static fn(IncludedData|string $item) => $item instanceof IncludedData ? $item->value : $item,
            $value
        );

        return $this->implodeComma($normalized);
    }

    private function implodeComma(array|string|null $value): ?string
    {
        if ($value === null) {
            return null;
        }
        return is_array($value) ? implode(',', $value) : $value;
    }
    private static function explodeComma(array|string|null $value): array|string|null
    {
        if ($value === null) {
            return null;
        }

        if (is_array($value)) {
            return $value;
        }

        // comma がなければ単一値として string のまま返す選択もありだが、
        // 今回は API 対称性を優先して array に寄せる
        return str_contains($value, ',')
            ? array_map('trim', explode(',', $value))
            : [$value];
    }

    private static function denormalizeIncludedData(array|string|null $value): ?array
    {
        if ($value === null) {
            return null;
        }

        $values = self::explodeComma($value);

        return array_map(
            static function (IncludedData|string $item) {
                if ($item instanceof IncludedData) {
                    return $item;
                }

                try {
                    return IncludedData::from($item);
                } catch (\ValueError) {
                    return $item;
                }
            },
            $values
        );
    }

    private static function denormalizeIdentifierType(IdentifierType|string|null $value): IdentifierType|string|null
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof IdentifierType) {
            return $value;
        }

        // enum に変換できなければ string のまま
        try {
            return IdentifierType::from($value);
        } catch (\ValueError) {
            return $value;
        }
    }

    public function __call(string $name, array $arguments): self
    {
        if (!str_starts_with($name, 'set')) {
            throw new \BadMethodCallException(sprintf('Method %s does not exist.', $name));
        }

        $property = lcfirst(substr($name, 3));

        if (!property_exists($this, $property)) {
            throw new \BadMethodCallException(sprintf('Property %s does not exist on %s.', $property, self::class));
        }

        $value = $arguments[0] ?? null;

        if ($property === 'includedData') {
            $this->includedData = self::denormalizeIncludedData($value);
            return $this;
        }

        if ($property === 'identifiersType') {
            $this->identifiersType = self::denormalizeIdentifierType($value);
            return $this;
        }

        if ($property === 'pageSize') {
            $this->pageSize = (int) $value;
            return $this;
        }

        if ($property === 'pageToken') {
            $this->pageToken = $value !== null ? (string) $value : null;
            return $this;
        }

        $this->{$property} = $value;

        return $this;
    }
}

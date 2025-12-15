<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\DataTransfarObject\Request;

use AmazonApi\Infrastructure\SpApi\CartApi\Enum\CustomerType;
use AmazonApi\Infrastructure\SpApi\CartApi\Enum\ItemCondition;
use InvalidArgumentException;

readonly class GetCartRequest
{
    private const JP_MARKETPLACE_ID = 'A1VC38T7YXB528';

    public function __construct(
        public string $marketPlaceId = self::JP_MARKETPLACE_ID,
        public ItemCondition $itemCondition = ItemCondition::NEW,
        public ?CustomerType $customerType = null
    ) {}

    /**
     * 配列から GetCartRequest を生成する
     *
     * - camelCase / PascalCase のキー表記ゆれを吸収する
     * - Enum は value から復元する
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        // MarketplaceId / marketPlaceId
        $marketPlaceId =
            $data['MarketplaceId']
            ?? $data['marketPlaceId']
            ?? self::JP_MARKETPLACE_ID;

        // ItemCondition / itemCondition
        $itemConditionValue =
            $data['ItemCondition']
            ?? $data['itemCondition']
            ?? ItemCondition::NEW->value;

        try {
            $itemCondition = ItemCondition::from($itemConditionValue);
        } catch (\ValueError $e) {
            throw new InvalidArgumentException(
                sprintf('Invalid ItemCondition value: %s', $itemConditionValue),
                0,
                $e
            );
        }

        // CustomerType / customerType（任意）
        $customerTypeValue =
            $data['CustomerType']
            ?? $data['customerType']
            ?? null;

        $customerType = null;
        if ($customerTypeValue !== null) {
            try {
                $customerType = CustomerType::from($customerTypeValue);
            } catch (\ValueError $e) {
                throw new InvalidArgumentException(
                    sprintf('Invalid CustomerType value: %s', $customerTypeValue),
                    0,
                    $e
                );
            }
        }

        return new self(
            marketPlaceId: (string) $marketPlaceId,
            itemCondition: $itemCondition,
            customerType: $customerType
        );
    }

    /**
     * API リクエスト用配列に変換する
     *
     * @return array
     */
    public function toArray(): array
    {
        $res = [
            'MarketplaceId' => $this->marketPlaceId,
            'ItemCondition' => $this->itemCondition->value,
        ];

        if ($this->customerType !== null) {
            $res['CustomerType'] = $this->customerType->value;
        }

        return $res;
    }
}

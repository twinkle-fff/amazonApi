<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\Enum;

enum WeightUnit: string
{
    case GRAMS = 'grams';
    case KILOGRAMS = 'kilograms';
    case POUNDS = 'pounds';
    case OUNCES = 'ounces';

    public function toGrams(float|int $value): float
    {
        return match ($this) {
            self::GRAMS     => (float) $value,
            self::KILOGRAMS => $value * 1000,
            self::POUNDS    => $value * 453.59237,
            self::OUNCES    => $value * 28.349523125,
        };
    }
}

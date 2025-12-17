<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\Enum;

enum LengthUnit: string
{
    case MILLIMETERS = 'millimeters';
    case CENTIMETERS = 'centimeters';
    case INCHES = 'inches';

    public function toCm(float|int $value): float
    {
        return match ($this) {
            self::MILLIMETERS => $value / 10,
            self::CENTIMETERS => (float) $value,
            self::INCHES      => $value * 2.54,
        };
    }
}

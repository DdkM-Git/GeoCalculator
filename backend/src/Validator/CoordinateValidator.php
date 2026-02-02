<?php

namespace MateuszDudek\Backend\Validator;

class CoordinateValidator
{
    private const LAT_MIN = -90;
    private const LAT_MAX = 90;
    private const LNG_MIN = -180;
    private const LNG_MAX = 180;

    public static function validate(array $data): void
    {
        foreach (['pointA', 'pointB'] as $point) {
            self::validatePoint($point, $data[$point] ?? null);
        }
    }

    private static function validatePoint(string $name, ?array $coords): void
    {
        if (!$coords || !isset($coords['lat'], $coords['lng'])) {
            throw new \InvalidArgumentException("Brak współrzędnych dla punktu $name");
        }

        if ($coords['lat'] < self::LAT_MIN || $coords['lat'] > self::LAT_MAX) {
            throw new \InvalidArgumentException("Nieprawidłowa szerokość geograficzna dla punktu $name");
        }

        if ($coords['lng'] < self::LNG_MIN || $coords['lng'] > self::LNG_MAX) {
            throw new \InvalidArgumentException("Nieprawidłowa długość geograficzna dla punktu $name");
        }
    }
}
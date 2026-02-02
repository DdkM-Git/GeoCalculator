<?php

namespace MateuszDudek\Backend\Validator;

class CoordinateValidator
{
    public static function validate(array $data): void
    {
        foreach (['pointA', 'pointB'] as $point) {
            if (!isset($data[$point]['lat'], $data[$point]['lng'])) {
                throw new \InvalidArgumentException('Brak współrzędnych');
            }

            if ($data[$point]['lat'] < -90 || $data[$point]['lat'] > 90) {
                throw new \InvalidArgumentException('Nieprawidłowa szerokość geograficzna');
            }

            if ($data[$point]['lng'] < -180 || $data[$point]['lng'] > 180) {
                throw new \InvalidArgumentException('Nieprawidłowa długość geograficzna');
            }
        }
    }
}
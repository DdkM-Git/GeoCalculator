<?php
namespace MateuszDudek\Backend\Service;

class DistanceCalculator
{
    private const EARTH_RADIUS = 6371000;

    public function calculate(float $latA, float $lngA, float $latB, float $lngB): array
    {
        $latA = deg2rad($latA);
        $lngA = deg2rad($lngA);
        $latB = deg2rad($latB);
        $lngB = deg2rad($lngB);

        $dLat = $latB - $latA;
        $dLng = $lngB - $lngA;

        $a = sin($dLat / 2) ** 2 + cos($latA) * cos($latB) * sin($dLng / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $totalMeters = self::EARTH_RADIUS * $c;
        $kilometers = floor($totalMeters / 1000);
        $meters = $totalMeters - ($kilometers * 1000);

        return [
            'kilometers' => $kilometers,
            'meters' => round($meters, 3),
        ];
    }
}
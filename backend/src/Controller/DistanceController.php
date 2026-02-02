<?php

namespace MateuszDudek\Backend\Controller;

use MateuszDudek\Backend\Service\DistanceCalculator;
use MateuszDudek\Backend\Validator\CoordinateValidator;

class DistanceController
{
    public function __construct(
        private DistanceCalculator $calculator
    ) {}

    public function calculate(array $data): array
    {
        CoordinateValidator::validate($data);

        $meters = $this->calculator->calculate(
            $data['pointA']['lat'],
            $data['pointA']['lng'],
            $data['pointB']['lat'],
            $data['pointB']['lng']
        );

        return [
            'distance' => [
                'meters' => round($meters, 2),
                'kilometers' => round($meters / 1000, 2)
            ]
        ];
    }
}

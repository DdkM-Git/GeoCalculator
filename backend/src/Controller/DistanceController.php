<?php

namespace MateuszDudek\Backend\Controller;

use MateuszDudek\Backend\Service\DistanceCalculator;
use MateuszDudek\Backend\Validator\CoordinateValidator;

class DistanceController
{
    public function calculate(array $data): array
    {
        CoordinateValidator::validate($data);

        $calculator = new DistanceCalculator();

        $meters = $calculator->calculate(
            $data['pointA']['lat'],
            $data['pointA']['lng'],
            $data['pointB']['lat'],
            $data['pointB']['lng']
        );

        return [
            'distance' => [
                'meters' => $meters,
                'kilometers' => $meters / 1000
            ]
        ];
    }
}

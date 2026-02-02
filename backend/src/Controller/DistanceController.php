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
        $validationError = $this->validate($data);

        if ($validationError !== null) {
            return $validationError;
        }

        return $this->calculateDistance($data);
    }

    private function validate(array $data): ?array
    {
        try {
            CoordinateValidator::validate($data);
            return null;
        } catch (\InvalidArgumentException $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    private function calculateDistance(array $data): array
    {
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

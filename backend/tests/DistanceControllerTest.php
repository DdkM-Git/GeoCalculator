<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MateuszDudek\Backend\Controller\DistanceController;
use MateuszDudek\Backend\Service\DistanceCalculator;

class DistanceControllerTest extends TestCase
{
    public function testControllerReturnsDistance()
    {
        $controller = new DistanceController(
            new DistanceCalculator()
        );

        $response = $controller->calculate([
            'pointA' => ['lat' => 52.2297, 'lng' => 21.0122],
            'pointB' => ['lat' => 50.0647, 'lng' => 19.9450],
        ]);

        $this->assertArrayHasKey('distance', $response);
        $this->assertArrayHasKey('meters', $response['distance']);
        $this->assertArrayHasKey('kilometers', $response['distance']);
    }

    public function testControllerReturnsErrorForInvalidData(): void
    {
        $controller = new DistanceController(
            new DistanceCalculator()
        );

        $response = $controller->calculate([
            'pointA' => ['lat' => 999, 'lng' => 10],
            'pointB' => ['lat' => 10, 'lng' => 10],
        ]);

        $this->assertArrayHasKey('error', $response);
    }
}

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MateuszDudek\Backend\Service\DistanceCalculator;

class DistanceCalculatorTest extends TestCase
{
    public function testDistanceBetweenWarsawAndCracow()
    {
        $calc = new DistanceCalculator();
        $distance = $calc->calculate(52.2297, 21.0122, 50.0647, 19.9450);

        $this->assertGreaterThan(250000, $distance);
        $this->assertLessThan(260000, $distance);
    }
}
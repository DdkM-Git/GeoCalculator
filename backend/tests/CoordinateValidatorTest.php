<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MateuszDudek\Backend\Validator\CoordinateValidator;

class CoordinateValidatorTest extends TestCase
{
    public function testThrowsExceptionForInvalidLatitude()
    {
        $this->expectException(\InvalidArgumentException::class);

        CoordinateValidator::validate([
            'pointA' => ['lat' => 200, 'lng' => 10],
            'pointB' => ['lat' => 10, 'lng' => 10]
        ]);
    }
}

public function testCalculatesDistanceBetweenTwoPoints()
{
    $calculator = new DistanceCalculator();

    $distance = $calculator->calculate(
        52.2297, 21.0122,
        50.0647, 19.9450
    );

    $this->assertGreaterThan(250000, $distance);
}
<?php
class MyCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testAdd_first_1_second_2_should_return_3()
    {
        // Arrange
        $target = new MyCalculator();
        $first = 1;
        $second = 2;

        $expected = 3;

        // Act
        $actual = $target->add($first, $second);

        // Assert
        $this->assertEquals($expected, $actual);

    }
}

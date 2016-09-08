<?php
namespace Math\NumericalAnalysis\NumericalDifferentiation;

class ThreePointFormulaTest extends \PHPUnit_Framework_TestCase
{
    public function testZeroError()
    {
        // f(x) = 13x² -92x + 96
        $f = function ($x) {
            return 13 * $x**2 - 92 * $x + 96;
        };

        /*
        *                                                        h²
        * Error term for the Second Derivative Midpoint Formula: - f⁽⁴⁾(ζ)
        *                                                        12
        *
        *     where ζ lies between x₀ - h and x₀ + h
        */

        // f'(x)   = 26x - 92
        // f''(x)  = 26
        // f⁽³⁾(x) = 0
        // f⁽⁴⁾(x) = 0
        // Thus, our error is zero in our formula

        $f’’ = function ($x) {
            return 26;
        };

        $n = 3;
        $a = 0;
        $b = 4;

        // Check that the midpoint formula agrees with f'(x) at x = 2
        $target = 2;
        $expected = $f’’($target);
        $actual = SecondDerivativeMidpointFormula::differentiate($target, $f, $a, $b, $n);
        $this->assertEquals($expected, $actual);
    }
}

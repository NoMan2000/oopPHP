<?php
namespace ChapterThree;


use Codeception\Specify;
use Oopphp\ChapterThree\AddCalc;
use Oopphp\ChapterThree\Calculator;
use Oopphp\ChapterThree\SubtractCalc;
use Oopphp\Contracts\OperationContract;

/**
 * Class CalculatorTest
 * @package ChapterThree
 */
class CalculatorTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var OperationContract
     */
    protected $calc;

    /**
     * @test
     */
    public function testCanPerformSubtractions()
    {
        $this->specify("Given a negation operator, can perform integer subtractions", function () {
            $calc = $this->calc;
            $result = $calc->calc('-', $calc::INT, 1, 2, 3, 4, 5, 6, 7);
            verify($result)->equals(-28);
            $resultTwo = $calc->calc('-', $calc::INT, 1, 2, 3, 4, 5, 6, 7.2);
            verify($resultTwo)->equals(-28);
        });

        $this->specify("Given a negation operator, can perform floating point subtraction", function () {
            $calc = $this->calc;
            $result = $calc->calc('-', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);
            verify($result)->equals(-28);
            $resultTwo = $calc->calc('-', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2);
            verify($resultTwo)->equals(-28.2);
        });
    }

    /**
     * @test
     */
    public function testCanPerformAdditions()
    {
        $this->specify("Given an addition operator, can perform integer additions", function () {
            $calc = $this->calc;
            $result = $calc->calc('+', $calc::INT, 1, 2, 3, 4, 5, 6, 7);
            verify($result)->equals(28);
            $resultTwo = $calc->calc('+', $calc::INT, 1, 2, 3, 4, 5, 6, 7.2);
            verify($resultTwo)->equals(28);
        });

        $this->specify("Given an addition operator, can perform floating point additions", function () {
            $calc = $this->calc;
            $result = $calc->calc('+', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);
            verify($result)->equals(28);
            $resultTwo = $calc->calc('+', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2);
            verify($resultTwo)->equals(28.2);
        });
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 1000
     */
    public function testCanThrowInvalidArgumentExceptionForBadOperation()
    {
        $this->specify("Will throw an Exception if the operation asked is not known", function () {
            $calc = $this->calc;
            $calc->calc('*', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);
        });
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 1001
     */
    public function testCanThrowInvalidArgumentExceptionForBadReturnTypeOnAddition()
    {
        $this->specify("Will throw an Exception if the operation asked is not known", function () {
            $calc = $this->calc;
            $calc->calc('+', 2, 1, 2, 3, 4, 5, 6, 7);
        });
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 1001
     */
    public function testCanThrowInvalidArgumentExceptionForBadReturnTypeOnSubtraction()
    {
        $this->specify("Will throw an Exception if the operation asked is not known", function () {
            $calc = $this->calc;
            $calc->calc('-', 2, 1, 2, 3, 4, 5, 6, 7);
        });
    }

    /**
     * Notice that this is why dependency injection and setter injection are popular
     * @before
     */
    protected function _before()
    {
        $this->calc = new Calculator(new SubtractCalc(new AddCalc()));
    }


}

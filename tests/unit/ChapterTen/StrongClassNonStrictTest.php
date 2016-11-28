<?php
// declare(strict_types=1);
namespace ChapterTen;

use Codeception\Specify;
use TypeError;
use Oopphp\ChaperTen\StrongClass;

/**
 * Class StrongClassNonStrictTest
 * @package ChapterTen
 */
class StrongClassNonStrictTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var StrongClass
     */
    protected $strongClass;


    /**
     *
     */
    protected function _before()
    {
        $this->strongClass = new StrongClass();
    }

    /**
     * @test
     */
    public function testStrongClassWithStrictTypesWillNotCoerceReturnTypes()
    {
        $this->specify($statement = "Strong class with return type will not convert the argument to the appropriate type and will throw an error", function () use ($statement) {

            verify($statement, $this->strongClass->getInt(1))->equals(1);
            verify($statement, $this->strongClass->getFloat(1.3333))->equals(1.3333);
            verify($statement, $this->strongClass->getString('1'))->equals('1');
            verify($statement, $this->strongClass->getBool(false))->equals(false);
        });
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function testWillThrowExceptionOnInvalidReturnTypes()
    {
        $this->specify($statement = "Using an invalid return type will throw an error", function () use ($statement) {
            verify($statement, $this->strongClass->getInt('1'))->equals(1);
            verify($statement, $this->strongClass->getInt('1'))->internalType('int');
            verify($statement, $this->strongClass->getInt(true))->equals(1);
            verify($statement, $this->strongClass->getInt(false))->equals(0);
            verify($statement, $this->strongClass->getInt(1.3333))->equals(1);
            verify($statement, $this->strongClass->getFloat('1'))->equals(1);
            verify($statement, $this->strongClass->getString(1))->equals('1');
            verify($statement, $this->strongClass->getBool(1))->equals(true);
            verify($statement, $this->strongClass->getBool(1))->internalType('bool');
        });
    }

    /**
     * @test
     */
    public function testVerifyWeakTestsWillCoerceInputValues()
    {
        $this->specify($statement = "Strong class with return type will convert the argument to the appropriate type if it is reasonable", function () use ($statement) {
            verify($statement, $this->strongClass->getTypedInt('1'))->equals(1);
            verify($statement, $this->strongClass->getTypedInt('1'))->internalType('int');


            verify($statement, $this->strongClass->getTypedInt(1))->equals(1);
            verify($statement, $this->strongClass->getTypedInt('1'))->equals(1);
            verify($statement, $this->strongClass->getTypedInt(true))->equals(1);
            verify($statement, $this->strongClass->getTypedInt(false))->equals(0);
            verify($statement, $this->strongClass->getTypedInt(1.3333))->equals(1);

            verify($statement, $this->strongClass->getTypedFloat('1'))->equals(1);

            verify($statement, $this->strongClass->getTypedFloat(1))->equals('1');

            verify($statement, $this->strongClass->getTypedBool(0))->equals(false);
            verify($statement, $this->strongClass->getTypedBool(1))->equals(true);

            verify($statement, $this->strongClass->getTypedBool(1))->internalType('bool');

            verify($statement, $this->strongClass->getTypedString(1))->equals('1');
        });
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function testVerifyWeakTestsWillFailOnInsaneCoercion()
    {
        $this->specify($statement = "An invalid type will fail", function () use ($statement) {
            verify($statement, $this->strongClass->getTypedBool([]))->equals(0);
        });
    }

    /**
     * PHP5 developers often coerced values on return, which can have very surprising results
     * @test
     */
    public function testWeakVersionCoerciveWillNotThrowError()
    {
        $this->specify($statement = "Passing an invalid argument type will not throw an error even if it is unreasonable", function () use ($statement) {

            $class = $this->strongClass->getClassToString();
            verify($statement, $class)->internalType('object');
            verify($statement, $this->strongClass->getCoerciveInt([]))->equals(0);
            verify($statement, $this->strongClass->getCoerciveInt([1]))->equals(1);
            verify($statement, $this->strongClass->getCoerciveFloat([1]))->equals(1);

            verify($statement, $this->strongClass->getCoerciveBool([]))->equals(false);
            verify($statement, $this->strongClass->getCoerciveBool([1]))->equals(true);
            // This is probably one of the most unexpected results
            verify($statement, $this->strongClass->getCoerciveBool($class))->equals(true);
            verify($statement, $this->strongClass->getCoerciveString($class))->equals('string');

        });
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function testWeakVersionNonCoerciveWillThrowError()
    {
        $this->specify($statement = "Returning an invalid type will throw an error", function () use ($statement) {
            verify($statement, $this->strongClass->getInt([]))->equals(0);
            verify($statement, $this->strongClass->getInt([1]))->equals(1);

            verify($statement, $this->strongClass->getFloat([]))->equals(0);
            verify($statement, $this->strongClass->getFloat([1]))->equals(1);



        });
    }
}

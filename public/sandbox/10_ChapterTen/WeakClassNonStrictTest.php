<?php
// declare(strict_types=1);
namespace ChapterTen;


use Codeception\Specify;
use Oopphp\ChaperTen\WeakClass;
use TypeError;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * Class StrictWeakTestsTest
 * @package ChapterTen
 */
class WeakClassNonStrictTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var WeakClass
     */
    protected $weakClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->weakClass = new WeakClass();
    }

    /**
     * @test
     */
    public function testVerifyWeakTestsWillCoerceReturnValuesAndNotInputValues()
    {
        $this->specify($statement = "Weak class with return type will convert the argument to the appropriate type if it is reasonable", function () use ($statement) {
            verify($statement, $this->weakClass->getInt('1'))->equals(1);
            verify($statement, $this->weakClass->getInt('1'))->internalType('int');


            verify($statement, $this->weakClass->getInt(1))->equals(1);
            verify($statement, $this->weakClass->getInt('1'))->equals(1);
            verify($statement, $this->weakClass->getInt(true))->equals(1);
            verify($statement, $this->weakClass->getInt(false))->equals(0);
            verify($statement, $this->weakClass->getInt(1.3333))->equals(1);

            verify($statement, $this->weakClass->getFloat('1'))->equals(1);

            verify($statement, $this->weakClass->getString(1))->equals('1');

            verify($statement, $this->weakClass->getBool(0))->equals(false);
            verify($statement, $this->weakClass->getBool(1))->equals(true);

            verify($statement, $this->weakClass->getBool(1))->internalType('bool');

        });
    }

    /**
     * @test
     */
    public function testVerifyWeakTestsWillCoerceInputValues()
    {
        $this->specify($statement = "Weak class with return type will convert the argument to the appropriate type if it is reasonable", function () use ($statement) {
            verify($statement, $this->weakClass->getTypedInt('1'))->equals(1);
            verify($statement, $this->weakClass->getTypedInt('1'))->internalType('int');


            verify($statement, $this->weakClass->getTypedInt(1))->equals(1);
            verify($statement, $this->weakClass->getTypedInt('1'))->equals(1);
            verify($statement, $this->weakClass->getTypedInt(true))->equals(1);
            verify($statement, $this->weakClass->getTypedInt(false))->equals(0);
            verify($statement, $this->weakClass->getTypedInt(1.3333))->equals(1);

            verify($statement, $this->weakClass->getTypedFloat('1'))->equals(1);

            verify($statement, $this->weakClass->getTypedFloat(1))->equals('1');

            verify($statement, $this->weakClass->getTypedBool(0))->equals(false);
            verify($statement, $this->weakClass->getTypedBool(1))->equals(true);

            verify($statement, $this->weakClass->getTypedBool(1))->internalType('bool');

            verify($statement, $this->weakClass->getTypedString(1))->equals('1');
        });
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function testVerifyWeakTestsWillFailOnInsaneCoercion()
    {
        $this->specify($statement = "An invalid type will fail", function () use ($statement) {
            verify($statement, $this->weakClass->getTypedBool([]))->equals(0);
        });
    }

    /**
     * PHP5 developers often coerced values on return, which can have very surprising results
     * @test
     */
    public function testWeakVersionCoerciveWillNotThrowError()
    {
        $this->specify($statement = "Passing an invalid argument type will not throw an error even if it is unreasonable", function () use ($statement) {

            $class = $this->weakClass->getClassToString();
            verify($statement, $class)->internalType('object');
            verify($statement, $this->weakClass->getCoerciveInt([]))->equals(0);
            verify($statement, $this->weakClass->getCoerciveInt([1]))->equals(1);
            verify($statement, $this->weakClass->getCoerciveFloat([1]))->equals(1);

            verify($statement, $this->weakClass->getCoerciveBool([]))->equals(false);
            verify($statement, $this->weakClass->getCoerciveBool([1]))->equals(true);
            // This is probably one of the most unexpected results
            verify($statement, $this->weakClass->getCoerciveBool($class))->equals(true);
            verify($statement, $this->weakClass->getCoerciveString($class))->equals('string');

        });
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function testWeakVersionNonCoerciveWillThrowError()
    {
        $this->specify($statement = "Returning an invalid type will throw an error", function () use ($statement) {
            verify($statement, $this->weakClass->getInt([]))->equals(0);
            verify($statement, $this->weakClass->getInt([1]))->equals(1);

            verify($statement, $this->weakClass->getFloat([]))->equals(0);
            verify($statement, $this->weakClass->getFloat([1]))->equals(1);



        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

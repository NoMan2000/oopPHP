<?php
declare(strict_types=1);

namespace ChapterTen;

require_once __DIR__ . '/WeakClassNonStrictTest.php';

use TypeError;


/**
 * Class WeakClassStrictTest
 * @package ChapterTen
 */
class WeakClassStrictTest extends WeakClassNonStrictTest
{
    /**
     * @test
     * Notice this behaves the same, turning strict_types on did not affect this one bit.
     */
    public function testVerifyWeakTestsWillCoerceReturnValuesAndNotInputValues()
    {
        $this->specify($statement = "Weak class with strict type in the return type will convert the argument to the appropriate type if it is reasonable", function () use ($statement) {
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
     * @expectedException TypeError
     */
    public function testVerifyWeakTestsWithStrictTypeDeclarationInCallerWillNotCoerceInputValues()
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

            verify($statement, $this->weakClass->getTypedFloat(1))->equals('1'); // only one that will work.

            verify($statement, $this->weakClass->getTypedBool(0))->equals(false);
            verify($statement, $this->weakClass->getTypedBool(1))->equals(true);

            verify($statement, $this->weakClass->getTypedBool(1))->internalType('bool');

            verify($statement, $this->weakClass->getTypedString(1))->equals('1');
        });
    }

    /**
     * @expectedException TypeError
     */
    public function testVerifyWeakTestsWillFailOnInsaneCoercion()
    {
        parent::testVerifyWeakTestsWillFailOnInsaneCoercion();
    }

    /**
     *
     */
    public function testWeakVersionCoerciveWillNotThrowError()
    {
        parent::testWeakVersionCoerciveWillNotThrowError();
    }

    /**
     * @expectedException TypeError
     */
    public function testWeakVersionNonCoerciveWillThrowError()
    {
        parent::testWeakVersionNonCoerciveWillThrowError();
    }

}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

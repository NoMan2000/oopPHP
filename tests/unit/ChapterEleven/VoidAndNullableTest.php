<?php

namespace ChapterEleven;

use Codeception\Specify;
use Oopphp\ChapterEleven\VoidAndNullable;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class VoidAndNullableTest
 * @package ChapterEleven
 */
class VoidAndNullableTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var \UnitTester
     */
    protected $tester;
    /**
     * @var VoidAndNullable
     */
    protected $voidClass;

    /**
     *
     */
    protected function _before()
    {
        $this->voidClass = new VoidAndNullable();
    }


    /**
     * @test
     */
    public function testCanReturnNullableType()
    {
        $this->specify($message = "A null type can be returned", function () use ($message) {
            verify($message, $this->voidClass->getStringOrNullReturn(null))->equals(null);
        });
        $this->specify($message = "A string type can be returned", function () use ($message) {
            verify($message, $this->voidClass->getStringOrNullReturn('Hey'))->equals('Hey');
        });
    }

    /**
     * @test
     */
    public function testWillReturnVoid()
    {
        $this->specify($message = "A void type will return null, but will throw an error if you explicitly return null", function () use ($message) {
            // Create a stub for the SomeClass class.
            $stub = $this->createMock(VoidAndNullable::class);

            $stub->expects($this->once())
                ->method('performAction')
                ->with($this->equalTo('action'));
             $stub->performAction('action');
             verify($this->voidClass->performAction('foo'))->equals(null);
        });
    }

    /**
     * @test
     */
    public function testWillFailOnNull()
    {
        $this->specify($message = "A void type will return null, but will throw an error if you explicitly return null", function () use ($message) {

            verify($this->voidClass->goodVoid())->equals(null);

        });
    }
}

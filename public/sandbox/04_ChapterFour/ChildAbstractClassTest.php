<?php
namespace ChapterFour;


use Codeception\Specify;
use Oopphp\ChapterFour\ChildAbstractClass;

/**
 * Class ChildAbstractClassTest
 * @package ChapterFour
 */
class ChildAbstractClassTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var ChildAbstractClass
     */
    protected $childClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->childClass = new ChildAbstractClass();
    }

    /**
     * @test
     */
    public function testCanImplementAndExtendTheParentClass()
    {
        $this->specify("Can get the parent class's methods", function () {
            verify($this->childClass->getFinalFunction())->equals("This is the final function");
        });

        $this->specify("Can extend a parent's methods and use a default value on a protected variable", function () {
            verify($this->childClass->getMyVariable())->equals("var");
        });

        $this->specify("Can implement an abstract method", function () {
            $this->childClass->setHiddenVariable('hidden');
            $this->childClass->setMyVariable('test');
            $data = $this->childClass->getData();
            verify($data['privateVariable'])->equals('hidden');
            verify($data['protectedVariable'])->equals('test');
        });
    }
}

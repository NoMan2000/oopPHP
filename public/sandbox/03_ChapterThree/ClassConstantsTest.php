<?php
namespace ChapterThree;

use Codeception\Specify;
use Oopphp\ChapterThree\ClassConstantOne;
use Oopphp\ChapterThree\ClassConstantTwo;

/**
 * Class ClassConstantsTest
 * @package ChapterThree
 */
class ClassConstantsTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @test
     */
    public function testCanOverrideAClassConstant()
    {
        $this->specify("A class constant can be overriden by a child class", function () {
            verify(ClassConstantOne::CONSTANT_ONE)->equals(1);
            verify(ClassConstantTwo::CONSTANT_ONE)->equals('one');
        });
    }
}

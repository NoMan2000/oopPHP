<?php
namespace ChapterTwo;

use Oopphp\ChapterTwo\GenericClass;

/**
 * Class GenericClassTest
 * @package ChapterTwo
 */
class GenericClassTest extends \Codeception\Test\Unit
{
    use \Codeception\Specify;
    /**
     * @var GenericClass
     */
    protected $class;

    /**
     *
     */
    protected function _before()
    {
        $this->class = new GenericClass();
    }

    /**
     *
     */
    public function testCanGetAndSetValuesAndReturnFluentModel()
    {
        $this->specify("Should have a default int value of 0", function () {
            verify($this->class->getIntProperty())->equals(0);
        });

        $this->specify("Should return the class back as a fluent method", function () {
            verify($this->class->setIntProperty(10))->isInstanceOf(GenericClass::class);
        });

        $this->specify("Should be able to set and retrieve an integer value", function () {
            $this->class->setIntProperty(14);
            verify($this->class->getIntProperty())->equals(14);
        });
    }
}

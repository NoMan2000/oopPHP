<?php
namespace ChapterSix;


use Codeception\Specify;
use Oopphp\ChapterSix\MagicMethodsClass;
use stdClass;
use InvalidArgumentException;

/**
 * Class MagicMethodsClassTest
 * @package ChapterSix
 */
class MagicMethodsClassTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var MagicMethodsClass
     */
    protected $magicMethodsClass;

    /**
     * @before
     */
    protected function _before()
    {
        $items = new stdClass();
        $items->func = function () {
            return "invoked";
        };
        $items->funcArgs = function ($value) {
            return $value;
        };
        $items->prop = "prop";
        $this->magicMethodsClass = new MagicMethodsClass($items);
    }

    /**
     * @test
     */
    public function testCanInvokeAMethodUsingCall()
    {
        $this->specify("Will call the items passed in the constructor", function () {
            verify($this->magicMethodsClass->func())->equals("invoked");
            verify($this->magicMethodsClass->funcArgs('random arg'))->equals('random arg');
        });
    }

    /**
     * @expectedException InvalidArgumentException
     * @test
     */
    public function testCanThrowAnExceptionOnInvalidCallArgument()
    {
        $this->specify("Will throw an exception on an invalid argument", function () {
            verify($this->magicMethodsClass->nonExistantFunc())->isInstanceOf(InvalidArgumentException::class);
        });
    }

    /**
     * @test
     */
    public function testCanAccessAPropertyUsingGet()
    {
        $this->specify("Can access a property passed in the constructor", function () {
            verify($this->magicMethodsClass->prop)->equals('prop');
        });
    }

    /**
     * @test
     */
    public function testCanMakeAStaticCallToObject()
    {
        $this->specify("A static call to the function can be made", function () {
            verify(MagicMethodsClass::someFunc())->equals(MagicMethodsClass::class);
        });
    }

    /**
     * @test
     */
    public function testCanSetANonExistentPropertyAndCheckifIsset()
    {
        $this->specify("A property can be dynamically set and get", function () {
            $this->magicMethodsClass->dynamic = "dynamic prop";
            verify($this->magicMethodsClass->dynamic)->equals('dynamic prop');
            verify(isset($this->magicMethodsClass->dynamic))->equals(true);
            verify(isset($this->magicMethodsClass->nonexistant))->equals(false);
            unset($this->magicMethodsClass->dynamic);
            verify(isset($this->magicMethodsClass->dynamic))->equals(false);
        });
    }

    /**
     * @test
     */
    public function testCanSerializeAndDeserializeAnObject()
    {
        $this->specify("The __sleep and __wakeup methods will be invoked when serializing and unserializing an object", function () {
            $connectionItemsStart = $this->magicMethodsClass->getConnectionItems();
            verify($connectionItemsStart)->isEmpty();
            $stringValues = serialize($this->magicMethodsClass);
            $arrayValues = (array) unserialize($stringValues); // Note that protected and private properties will have special characters
            $classValues = unserialize($stringValues);
            verify($arrayValues['thing'])->equals(1);
            verify($classValues->thing)->equals(1);
        });
    }

    /**
     * @test
     */
    public function testCanCallToStringMethod()
    {
        $this->specify("Will return the classname when cast into a string", function () {
            verify(strval($this->magicMethodsClass))->equals(MagicMethodsClass::class);
        });
    }

    /**
     * @test
     */
    public function testCanInvokeTheObject()
    {
        $this->specify("Can invoke an object", function () {
            $function = function () {
                return 'function';
            };
            $class = $this->magicMethodsClass;
            verify($class($function))->equals('function');
        });
    }

    /**
     * @test
     */
    public function testSetState()
    {
        $this->specify("Can get an object with var_export and return set to true", function () {
            $value = var_export($this->magicMethodsClass, true);
            verify($value)->contains('thing');
        });
    }
}

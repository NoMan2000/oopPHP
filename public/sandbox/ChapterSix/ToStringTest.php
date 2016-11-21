<?php

namespace ChapterSix;


use Codeception\Specify;
use Oopphp\ChapterSix\ToString;

/**
 * Class ToStringTest
 * @package ChapterSix
 */
class ToStringTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var ToString
     */
    protected $toStringClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->toStringClass = new ToString();
    }

    /**
     * @test
     */
    public function testCanCastObjectToAStringRepresentation()
    {
        $this->specify("Casting an object as a string will return the __toString method", function () {
            verify(strval($this->toStringClass))->equals("test string");
        });
    }
}

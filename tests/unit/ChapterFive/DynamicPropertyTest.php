<?php
namespace ChapterFive;


use Codeception\Specify;
use Oopphp\ChapterFive\DynamicProperty;

/**
 * Class DynamicPropertyTest
 * @package ChapterFive
 */
class DynamicPropertyTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var DynamicProperty
     */
    protected $dynamicPropClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->dynamicPropClass = new DynamicProperty();
    }

    /**
     * @test
     */
    public function testCanGetADynamicProperty()
    {
        $this->specify("Can get a dynamic property", function () {
            verify($this->dynamicPropClass->getDynamicProperty())->equals("bad");
        });
    }
}

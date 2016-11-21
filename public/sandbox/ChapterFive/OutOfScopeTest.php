<?php
namespace ChapterFive;


use Codeception\Specify;
use Oopphp\ChapterFive\OutOfScope;

/**
 * Class OutOfScopeTest
 * @package ChapterFive
 */
class OutOfScopeTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var OutOfScope
     */
    protected $outOfScopeClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->outOfScopeClass = new OutOfScope();
    }

    /**
     * @test
     */
    public function testCanCreateMagicGettersAndSetters()
    {
        $this->specify("Can get and set a value dynamically", function () {

            verify($this->outOfScopeClass->foo)->equals(null);
            $this->outOfScopeClass->foo = "bar";
            verify($this->outOfScopeClass->foo)->equals("bar");
        });
    }
}

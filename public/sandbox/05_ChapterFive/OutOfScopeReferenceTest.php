<?php
namespace ChapterFive;

use Codeception\Specify;
use Oopphp\ChapterFive\OutOfScopeReference;

/**
 * Class OutOfScopeReferenceTest
 * @package ChapterFive
 */
class OutOfScopeReferenceTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var OutOfScopeReference
     */
    protected $outOfScopeReference;

    /**
     * @before
     */
    protected function _before()
    {
        $this->outOfScopeReference = new OutOfScopeReference();
    }

    /**
     * @test
     */
    public function testCanSetAndRetrieveValuesByReference()
    {
        /**
         * Please never do this, but you can pass by reference with a magic __get method
         */
        $this->specify("Can get and set a value dynamically", function ()  {

            $this->outOfScopeReference->foo = "Jack";
            $bad =& $this->outOfScopeReference->foo;
            $this->outOfScopeReference->foo = 'Me';
            verify($bad)->equals("Me");
        });

        $this->specify("Can still retrieve null", function () {
            $x = $this->outOfScopeReference->foo;
            verify($x)->equals(null);
        });
    }
}

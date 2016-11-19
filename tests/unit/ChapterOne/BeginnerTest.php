<?php

namespace ChapterOne;

use Oopphp\ChapterOne\Beginner;

/**
 * Class BeginnerTest
 * @package ChapterOne
 */
class BeginnerTest extends \Codeception\Test\Unit
{
    use \Codeception\Specify;

    /**
     * @var Beginner
     */
    protected $class;

    /**
     *
     */
    protected function _before()
    {
        $this->class = new Beginner();
    }

    /**
     * Degenerate tests are a name for tests that will always return true or false.
     * Often, these are used to prevent solving the problem too quickly and thus leading to a lot of untestable code,
     * or to make sure that the framework is working.
     *
     * @test
     */
    public function testCanRunDegenerateTests()
    {

        $this->specify("Should evaluate true as true", function () {
            verify($this->class->isTrue())->equals(true);
        });

        $this->specify("Should evaluate false as false", function () {
            verify($this->class->isFalse())->equals(false);
        });

        $this->specify("Should evaluate the passed in boolean as a boolean", function () {
            verify($this->class->isBool(true))->equals(true);
            verify($this->class->isBool(false))->equals(false);
        });
    }
}

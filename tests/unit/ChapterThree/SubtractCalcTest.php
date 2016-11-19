<?php
namespace ChapterThree;

use Codeception\Specify;
use Oopphp\ChapterThree\AddCalc;
use Oopphp\ChapterThree\SubtractCalc;

/**
 * Class SubtractCalcTest
 * @package ChapterThree
 */
class SubtractCalcTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var SubtractCalc
     */
    protected $subtractCalc;

    /**
     * @before
     */
    protected function _before()
    {
        $this->subtractCalc = new SubtractCalc(new AddCalc());
    }

    /**
     * @test
     */
    public function testCanDelegateTasksToAnotherObjectAndImplementAnInterface()
    {
        $this->specify("Can subtract a list of numbers and return an integer, even if floating point numbers given", function () {
            verify($this->subtractCalc->subtractInt(1, 2, 3))->equals(-6);
            verify($this->subtractCalc->subtractInt(2.2, 2, 2))->equals(-6);
        });

        $this->specify("Can subtract a list of numbers and return a float", function () {
            verify($this->subtractCalc->subtractFloat(1, 2.2))->equals(-3.2);
        });

        $this->specify("Can add a list of numbers and return an integer", function () {
            verify($this->subtractCalc->addInt(1, 2, 3, 4))->equals(10);
        });

        $this->specify("Can add a list of numbers and return a float", function () {
            verify($this->subtractCalc->addFloat(1, 2, 3, 4.1))->equals(10.1);
        });

    }


}

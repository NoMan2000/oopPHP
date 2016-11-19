<?php
namespace ChapterThree;


use Codeception\Specify;
use Oopphp\ChapterThree\CalcIterator;
use Oopphp\Contracts\OperationContract;

/**
 * Class CalcIteratorTest
 * @package ChapterThree
 */
class CalcIteratorTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var CalcIterator
     */
    protected $calcIterator;

    /**
     * @before
     */
    protected function _before()
    {
        $numbers = [1, 2, 3, 4];
        $this->calcIterator = new CalcIterator($numbers);
    }

    /**
     * @test
     */
    public function testCanImplementTheContract()
    {
        $this->specify("Can perform an operation", function () {
            verify($this->calcIterator->calc('+', OperationContract::INT))->equals(10);
        });

        $this->specify("Can perform a foreach loop with Keys and values", function () {
            $itemList = $this->calcIterator->getItemList();
            foreach ($this->calcIterator as $key => $value) {
                verify($value)->equals($itemList[$key]);
            }
        });
    }
}

<?php

namespace ChapterThree;

use Codeception\Specify;
use Oopphp\ChapterThree\AddCalc;

/**
 * Class AddCalcTest
 * @package ChapterThree
 */
class AddCalcTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var AddCalc
     */
    protected $addCalc;

    /**
     * @before
     */
    protected function _before()
    {
        $this->addCalc = new AddCalc();
    }


    /**
     * @test
     */
    public function testCanImplementAContractAndReturnCorrectType()
    {
        $this->specify("Can add a variable range of numbers and return an integer", function () {

            verify($this->addCalc->addInt('25'))->equals(25);
            verify($this->addCalc->addInt(25, 10, 33))->equals(68);
            verify($this->addCalc->addInt(10, -10))->equals(0);
            verify($this->addCalc->addInt(10.5, 1.2))->equals(11);
            verify($this->addCalc->addInt(2.2))->internalType('integer');
        });

        $this->specify("Can add a variable range of numbers and return a float", function () {
            verify($this->addCalc->addFloat(1, 2, 3.4))->equals(6.4);
            verify($this->addCalc->addFloat(2.2))->internalType('float');
        });
    }
}

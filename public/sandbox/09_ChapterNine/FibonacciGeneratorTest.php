<?php

namespace ChapterNine;

use Codeception\Specify;
use Oopphp\ChapterNine\FibonacciGenerator;

/**
 * Class FibonacciGeneratorTest
 * @package ChapterNine
 */
class FibonacciGeneratorTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var FibonacciGenerator
     */
    protected $fibonacciClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->fibonacciClass = new FibonacciGenerator();
    }

    /**
     *
     */
    public function testCanGenerateAFibonacciSequence()
    {
        $this->specify("Can return a generated list", function () {
            $outerKey = 0;
            $outerValue = 0;
            foreach ($this->fibonacciClass->getSequence(19) as $key => $value) {
                $outerKey = $key;
                $outerValue = $value;
            }
            verify($outerKey)->equals(19);
            verify($outerValue)->equals(4181);
        });

    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

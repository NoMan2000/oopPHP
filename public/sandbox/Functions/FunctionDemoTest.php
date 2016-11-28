<?php

namespace Functions;

use Codeception\Specify;
use Oopphp\Functions;
use function Oopphp\Functions\getHelloWorld as helloWorld;
use const Oopphp\Functions\hello as helloDemo;

/**
 * Class FunctionDemoTest
 * @package Functions
 */
class FunctionDemoTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @test
     */
    public function testCanGrabANamespacedFunctionOrConstant()
    {
        $this->specify($statement = "Can grab a function or constant from a namespace", $exec = function () use ($statement) {
            verify($statement . ' Functions\getHelloWorld()', Functions\getHelloWorld())->equals('Hello World');
            verify($statement . 'Functions\hello', Functions\hello)->equals('hello');
        });

        $this->specify($statement = "Can grab an aliased function or constant from a namespace", function () use ($statement) {
            verify($statement . 'helloWorld()', helloWorld())->equals("Hello World");
            verify($statement . 'helloDemo', helloDemo)->equals('hello');
        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

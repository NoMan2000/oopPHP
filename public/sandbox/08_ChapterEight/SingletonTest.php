<?php
namespace ChapterEight;

use Oopphp\ChapterEight\Singleton;
use Codeception\Specify;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * Class SingletonTest
 * @package 8_ChapterEight
 */
class SingletonTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     *
     */
    public function testCanRunSingleton()
    {
        $this->specify("A singleton class is always equal to itself", function () {
            $singletonOne = Singleton::getInstance();
            $singletonTwo = Singleton::getInstance();
            verify($singletonOne)->equals($singletonTwo);
        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

<?php

namespace ChapterSix;

use Codeception\Specify;
use Oopphp\ChapterSix\ToString;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * Class ToStringTest
 * @package ChapterSix
 */
class ToStringTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var ToString
     */
    protected $toStringClass;

    /**
     * @before
     */
    protected function _before()
    {
        $this->toStringClass = new ToString();
    }

    /**
     * @test
     */
    public function testCanCastObjectToAStringRepresentation()
    {
        $this->specify("Casting an object as a string will return the __toString method", function () {
            verify(strval($this->toStringClass))->equals("test string");
        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

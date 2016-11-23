<?php
namespace ChapterTen;


use Codeception\Specify;
use Oopphp\ChaperTen\StaticSelf;
use Oopphp\ChaperTen\StaticSelfChild;

/**
 * Class StaticSelfTest
 * @package ChapterTen
 */
class StaticSelfTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var StaticSelf
     */
    protected $staticClass;

    /**
     * @var StaticSelfChild
     */
    protected $staticChildClass;

    /**
     *
     */
    protected function _before()
    {
        $this->staticClass = new StaticSelf();
        $this->staticChildClass = new StaticSelfChild();
    }

    /**
     *
     */
    public function testMe()
    {

    }
}

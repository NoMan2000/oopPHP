<?php
namespace ChapterTen;

use Codeception\Specify;
use Oopphp\ChaperTen\StaticSelf;
use Oopphp\ChaperTen\StaticSelfChild;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


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
    public function testLateStaticValues()
    {
        $this->specify($statement = "A late value binding should be bound to the child class, an early static binding will be bound to the parent", function () {
            expect($this->staticClass->getSelf())->equals(StaticSelf::class);
            expect($this->staticClass->getStatic())->equals(StaticSelf::class);

            expect($this->staticChildClass->getSelf())->equals(StaticSelf::class); // This is the unexpected result
            expect($this->staticChildClass->getStatic())->equals(StaticSelfChild::class);
        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

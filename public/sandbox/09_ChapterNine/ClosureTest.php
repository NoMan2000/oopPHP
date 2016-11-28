<?php
namespace ChapterNine;

use Codeception\Specify;
use Oopphp\ChapterNine\Closures;

/**
 * Class ClosureTest
 * @package ChapterNine
 */
class ClosureTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var Closures
     */
    protected $closure;
    /**
     * @before
     */
    public function _before()
    {
        $this->closure = new Closures();
    }
    /**
     *
     */
    public function testCanLoadInScopedAndOutOfScopeVariables()
    {
        $this->specify("", function () {
            $loadLocal = $this->closure->loadLocal; // Closures are like static properties, they have to be stored first.
            $loadGlobal = $this->closure->loadGlobal;
            $GLOBALS['localVariable'] = 1000;
            verify($loadGlobal())->equals(1000);
            verify($loadLocal())->equals(1);
        });

    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

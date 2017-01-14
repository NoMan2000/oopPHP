<?php
namespace ChapterEight;

use Codeception\Scenario;
use Oopphp\ChapterEight\GetTwoNamedTraits;
use UnitTester;
use Codeception\Specify;


/**
 * Class GetTwoNamedTraitsTest
 * @package ChapterEight
 */
class GetTwoNamedTraitsTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var UnitTester
     */
    protected $tester;
    /**
     * @var GetTwoNamedTraits
     */
    protected $getTwoNamedTraits;

    /**
     *
     */
    protected function _before()
    {
        $this->tester = new UnitTester(new Scenario($this));
        $this->getTwoNamedTraits = new GetTwoNamedTraits();
    }

    /**
     * @test
     */
    public function testCanSetOverriddenTrait()
    {
        $this->specify($statement = "Can Get and Set a Name Property using the insteadof methods", function () use ($statement) {
            $name = "George";
            $this->getTwoNamedTraits->setName($name);
            verify($statement, $this->getTwoNamedTraits->getName())->equals($name);
        });
    }

    public function testCanGetTheAliasedName()
    {
        $this->specify($statement = "Can Get and Set a Name Property using the insteadof methods", function () use ($statement) {
            $name = "Sam";
            verify($statement, $this->getTwoNamedTraits->getSam())->equals($name);
        });
    }

    public function testCanCallAChangedScope()
    {
        $this->specify($statement = "Can Call a method with a changed scope in the class", function () use ($statement) {
            verify($statement, $this->getTwoNamedTraits->changeScope())->equals("string");
            verify($statement, $this->getTwoNamedTraits->newScope())->equals("string");
        });
    }
}

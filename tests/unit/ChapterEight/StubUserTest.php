<?php

namespace ChapterEight;

use Codeception\Scenario;
use Codeception\Specify;
use Oopphp\ChapterEight\StubUser;
use UnitTester;

/**
 * Class StubUserTest
 * @package ChapterEight
 */
class StubUserTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * @var StubUser
     */
    protected $stubUser;

    /**
     *
     */
    protected function _before()
    {
        $this->tester = new UnitTester(new Scenario($this));
        $this->tester->amGoingTo("Test setting and getting the name and IDs");
        $this->stubUser = new StubUser();
    }

    /**
     *
     */
    public function testCanGetAndSetName()
    {
        $this->specify($statement = "Can Get and Set a Name Property", function () use ($statement) {
            $name = "George";
            $this->stubUser->setName($name);
            verify($statement, $this->stubUser->getName())->equals($name);
        });
    }

    /**
     *
     */
    public function testCanGetAndSetId()
    {
        $this->specify($statement = "Can Get and Set the id Property", function () use ($statement) {
            $id = 10;
            $this->stubUser->setId($id);
            verify($statement, $this->stubUser->getId())->equals($id);
        });
    }
}

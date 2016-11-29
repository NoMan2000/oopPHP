<?php
namespace ChapterNine;
use Codeception\Specify;
use Oopphp\ChapterNine\UserClassGenerator;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * Class UserClassGeneratorTest
 * @package ChapterNine
 */
class UserClassGeneratorTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var UserClassGenerator
     */
    protected $userGenerator;
    /**
     * @before
     */
    protected function _before()
    {
        $this->userGenerator = new UserClassGenerator([
            'Username' => 'john',
            'ID' => 100
        ]);
    }

    /**
     * @test
     */
    public function testCanImplementAContract()
    {
        $this->specify("An anonymous class can implement the correct contract", function () {
            verify($this->userGenerator->getClass()->getID())->equals(100);
            verify($this->userGenerator->getClass()->getUsername())->equals('john');
        });
    }
}

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

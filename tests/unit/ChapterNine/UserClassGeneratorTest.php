<?php
namespace ChapterNine;
use Codeception\Specify;
use Oopphp\ChapterNine\UserClassGenerator;

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

        });
    }
}

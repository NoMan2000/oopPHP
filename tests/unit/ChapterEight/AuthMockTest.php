<?php
namespace ChapterEight;

use Codeception\Specify;
use Oopphp\ChapterEight\Auth;
use org\bovigo\vfs\{vfsStream,vfsStreamDirectory};
use Mockery as m;
use Psr\Log\LoggerInterface;

/**
 * Note:  This version of the test uses Mockery to mock the LoggerInterface (so we're not using a real logger)
 *        and it uses vfsStream to mock the file system (so we're never actually writing to the file system)
 *
 * Class AuthMockTest
 * @package ChapterEight
 */
class AuthMockTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var Auth
     */
    protected $authClass;
    /**
     * @var vfsStreamDirectory
     */
    protected $logFileRoot;

    /**
     * @var m\Mock
     */
    protected $loggerInterface;

    /**
     * @before
     */
    protected function _before()
    {
        $this->loggerInterface = m::mock(LoggerInterface::class);
        $this->logFileRoot = vfsStream::setup('home', null, ['auth.log' => '']);
        $this->authClass = new Auth(
            $this->loggerInterface,
            vfsStream::url('home/auth.log')
        );
    }

    public function _after()
    {
        parent::_after();
        m::close();
    }

    /**
     * @test
     */
    public function testCanLogOnSuccessfulLogin()
    {
        $userID = '122';
        $this->loggerInterface->shouldReceive('info')->once();
        $this->authClass->successAuth($userID);
        $this->logFileRoot->getChild('auth.log')->write($userID);
        $fileLocation = $this->authClass->getFileLocation();
        $contents = file_get_contents($fileLocation);
        verify($contents)->contains($userID);
    }

    /**
     * @test
     */
    public function testCanLogOnFailedLogin()
    {
        $userID = '122';
        $this->loggerInterface->shouldReceive('warning')->once();
        $this->authClass->failAuth($userID);
        $this->logFileRoot->getChild('auth.log')->write($userID);
        $fileLocation = $this->authClass->getFileLocation();
        $contents = file_get_contents($fileLocation);
        verify($contents)->contains($userID);
    }

    /**
     * @test
     */
    public function testCanSetFileLocation()
    {
        $this->specify("Can set File Location", function () {
            $fileLocation = $this->authClass->getFileLocation();
            $this->authClass->setFileLocation($fileLocation);
            $newFileLocation = $this->authClass->getFileLocation();
            verify($newFileLocation)->equals($fileLocation);
        });
    }
}

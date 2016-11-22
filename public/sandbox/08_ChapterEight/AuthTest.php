<?php
namespace ChapterEight;

use Codeception\Specify;
use Oopphp\ChapterEight\Auth;
/**
 * Class AuthTest
 * @package 8_ChapterEight
 */
class AuthTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @var Auth
     */
    protected $authClass;

    /**
     * Check if the file exists and empty it out.
     * @before
     */
    protected function _before()
    {
        $this->authClass = new Auth();
        $logFile = $this->authClass->getFileLocation();
        $logFileExists = file_exists($logFile);
        if ($logFileExists) {
            file_put_contents($logFile, '');
        }
        if (!$logFileExists) {
            touch($logFile);
        }
    }

    public function _after()
    {
        parent::_after();
    }

    /**
     * @test
     */
    public function testCanLogOnSuccessfulLogin()
    {
        $this->specify("Can output a successful login", function () {
            $this->authClass->successAuth(122);
            $fileLocation = $this->authClass->getFileLocation();
            $contents = file_get_contents($fileLocation);
            verify($contents)->contains('122');
        });
    }

    /**
     * @test
     */
    public function testCanLogOnFailedLogin()
    {
        $this->specify("Can output a failed login", function () {
            $this->authClass->failAuth(122);
            $fileLocation = $this->authClass->getFileLocation();
            $contents = file_get_contents($fileLocation);
            verify($contents)->contains('122');
        });
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

<?php

/**
 * This allows overwriting of built-in PHP functions and objects because of PHPs namespace fallback policy.
 */
namespace Oopphp\ChapterEight {
    function time()
    {
        return 123;
    }
}

namespace ChapterEight {

    use Codeception\Specify;
    use Oopphp\ChapterEight\Auth;
    use org\bovigo\vfs\{
        vfsStream, vfsStreamDirectory
    };
    use Prophecy\Prophecy\ObjectProphecy;
    use Psr\Log\LoggerInterface;

    /**
     * Note:  This version of the test uses Prophecy to mock the LoggerInterface (so we're not using a real logger)
     *        and it uses vfsStream to mock the file system (so we're never actually writing to the file system)
     *
     * Class AuthProphecyTest
     * @package ChapterEight
     */
    class AuthProphecyTest extends \Codeception\Test\Unit
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
         * @var ObjectProphecy
         */
        protected $loggerInterface;

        /**
         * @before
         */
        protected function _before()
        {
            $this->loggerInterface = $this->prophesize(LoggerInterface::class);
            $this->logFileRoot = vfsStream::setup('home', null, ['auth.log' => '']);
            $this->authClass = new Auth(
                $this->loggerInterface->reveal(),
                vfsStream::url('home/auth.log')
            );
        }

        public function _after()
        {
            parent::_after();
            $this->loggerInterface->checkProphecyMethodsPredictions();
        }

        /**
         * @test
         */
        public function testCanLogOnSuccessfulLogin()
        {
            $userID = '122';
            $this->loggerInterface->info("User with an ID of 122 successfully logged in at 1970-01-01 00:02:03", ["ip" => "1.0.0.0.1", "id" => 122])->shouldBeCalled();
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
            $this->loggerInterface->warning("User with an ID of 122 failed to login", ["ip" => "1.0.0.0.1", "id" => 122])->shouldBeCalled();
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
}
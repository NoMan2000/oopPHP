<?php

namespace Oopphp\ChapterEight;

use Oopphp\Traits\LogTrait;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use DateTime;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class LogTest
 * @package Oopphp\ChapterEight
 */
class Auth implements LoggerInterface, LoggerAwareInterface
{
    use LogTrait;

    protected $fileLocation;

    /**
     * @return string
     */
    public function getFileLocation(): string
    {
        return $this->fileLocation;
    }

    /**
     * @param string $fileLocation
     * @return Auth
     */
    public function setFileLocation(string $fileLocation): Auth
    {
        $this->fileLocation = $fileLocation;
        return $this;
    }

    /**
     * Auth constructor.
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        LoggerInterface $logger = null,
        string $fileLocation = __DIR__ . '/../../../logs/auth.log',
        $whenToLogLevel = Logger::DEBUG
    ) {
        $this->fileLocation = $fileLocation;
        $this->logger = $logger ?: (new Logger('auth'))->pushHandler(new StreamHandler($fileLocation, $whenToLogLevel));
    }

    /**
     * @param int $userID
     */
    public function failAuth(int $userID)
    {
        $this->warning(
            "User with an ID of $userID failed to login",
            [
                'ip' => '1.0.0.0.1',
                'id' => $userID,
            ]
        );
    }

    /**
     * @param int $userID
     */
    public function successAuth(int $userID)
    {
        $this->info
            ("User with an ID of $userID successfully logged in at " . (new DateTime())->format('Y-m-d H:i:s'),
            [
                'ip' => '1.0.0.0.1',
                'id' => $userID,
            ]
        );
    }
}

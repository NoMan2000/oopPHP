<?php

namespace Oopphp\Traits;

use Psr\Log\LoggerInterface;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class LogTrait
 * @package Oopphp\Traits
 */

trait LogTrait
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $message
     * @param array $context
     */
    public function emergency($message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * @param $message
     * @param array $context
     */
    public function alert($message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    /**
     * @param $message
     * @param array $context
     */
    public function critical($message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }


    /**
     * @param $message
     * @param array $context
     */
    public function error($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    /**
     * @param $message
     * @param array $context
     */
    public function warning($message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }


    /**
     * @param $message
     * @param array $context
     */
    public function notice($message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    /**
     * @param $message
     * @param array $context
     */
    public function info($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    /**
     * @param $message
     * @param array $context
     */
    public function debug($message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    /**
     * @param $level
     * @param $message
     * @param array $context
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, $message, $context);
    }

}

<?php

namespace Oopphp\Exceptions;
use ErrorException;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * Class ErrorException
 * @package Oopphp\Exceptions
 */
class ErrorExceptionHandler
{
    /**
     * ErrorException constructor.
     */
    public function __construct()
    {
        set_error_handler([$this, 'errorHandler']);
    }

    /**
     * @param int $errSeverity
     * @param string $errMessage
     * @param string $errFile
     * @param int $errLine
     * @param array|null $err_context
     * @return bool
     * @throws ErrorException
     */
    public function errorHandler(int $errSeverity, string $errMessage, string $errFile, int $errLine, array $err_context = null)
    {
        // error was suppressed with the @-operator
        if (error_reporting() === 0) {
            return false;
        }
        throw new ErrorException($errMessage, $errSeverity, $errSeverity, $errFile, $errLine);
    }
}

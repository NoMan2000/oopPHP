<?php
/**
 * A bootstrap file does any initial work that needs to be done.  Examples are starting sessions,
 * checking user credentials, reading JWT tokens, etc.
 * Here it's just a short-hand for using the autoloader.
 */
use Oopphp\Exceptions\ErrorExceptionHandler;

require_once __DIR__ . '/../vendor/autoload.php';
// This will simply invoke the function
(new ErrorExceptionHandler);

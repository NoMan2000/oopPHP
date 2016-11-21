<?php
/**
 * A bootstrap file does any initial work that needs to be done.  Examples are starting sessions,
 * checking user credentials, reading JWT tokens, etc.
 * Here it's just a short-hand for using the autoloader.
 */

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * @param string $message
 * @param bool $assertion
 * @param string $assertionStatement
 */
function callBackAssertion(string $message, bool $assertion, string $assertionStatement)
{
    $exception = new Exception("$assertionStatement failed while expecting: $message");
    $validAssertion = assert($assertion, $exception);
    if ($validAssertion) {
        echo "<p>Assertion: $assertionStatement passed with expectation: $message</p>";
    }
    if (!$validAssertion) {
        echo "<p>Invalid Assertion: $assertionStatement failed with expectation: $message</p>";
    }

}

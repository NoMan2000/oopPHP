<?php

use Oopphp\Testing\VerifyExt;

require_once __DIR__ . '/../../../vendor/autoload.php';

spl_autoload_register(
    function ($className) {
        $file = str_replace('\\', '/', $className) . '.php';
        $classLocation = __DIR__ . "/../../unit/$file";
        if (file_exists($classLocation)) {
            return require_once $classLocation;
        }
        $classLocation = __DIR__ . "/../vendor/codeception/verify/src/Codeception/$file";
        if (file_exists($classLocation)) {
            return require_once $classLocation;
        }
    }
);

if (!function_exists('callBackAssertion')) {
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
            echo "<p class='alert alert-info'><strong>Assertion:</strong> <code>$assertionStatement</code> passed with expectation: $message</p>";
        }
        if (!$validAssertion) {
            echo "<p class='alert alert-danger'><strong>Invalid Assertion:</strong> <code>$assertionStatement</code> failed with expectation: $message</p>";
        }

    }
}

if (!function_exists('specify')) {
    /**
     * @param string $specification
     * @param Closure|null $callable
     * @param array $params
     */
    function specify(string $specification, \Closure $callable = null, $params = [])
    {
        if (!$callable) {
            return null;
        }
        return $callable(...$params);
    }
}

if (!function_exists("gettype_operators")) {
    /**
     * @return array
     */
    function gettype_operators()
    {
        return [
            "boolean",
            "integer",
            "double",
            "string",
            "array",
            "object",
            "resource",
            "NULL",
            "unknown type",
        ];
    }
}

if (!function_exists('printAssertion')) {
    /**
     * @param array $assertion
     * @param bool $weakComparison
     */
    function printAssertion(array $assertion, bool $weakComparison = false)
    {
        $expected = array_get($assertion, 'expected');
        $actual = array_get($assertion, 'actual');
        $description = array_get($assertion, 'description');
        $matches = false;

        if (is_object($expected)) {
            $expected = (new ReflectionClass($expected))->getName();
        }

        if (is_object($actual)) {
            $actual = (new ReflectionClass($actual))->getName();
        }

        $getType = in_array($expected, gettype_operators(), true);

        if ($getType) {
            $actual = gettype($actual);
        }
        $matches = $expected === $actual;
        if ($weakComparison) {
            $matches = $expected == $actual;
        }

        if (!is_scalar($expected)) {
            $expected = "Type of " . gettype($expected) . "Not coercible";
        }
        if (true === $expected) {
            $expected = 'true';
        }
        if (false === $expected) {
            $expected = 'false';
        }
        if (null === $expected) {
            $expected = 'null';
        }

        if (!is_scalar($actual)) {
            $actual = "Type of " . gettype($actual) . "Not coercible";
        }

        if (false === $actual) {
            $actual = 'false';
        }
        if (null === $actual) {
            $actual = 'null';
        }
        if (true === $actual) {
            $actual = 'true';
        }

        if (!is_scalar($description)) {
            $actual = "Type of " . gettype($description) . "Not coercible";
        }
        if ($matches) {
            echo "<p class='alert alert-success'><strong>Assertion:</strong> $description passed with an expected value of <var>$expected</var> that matches the actual value of <var>$actual</var>.</p>";
        }
        if (!$matches) {
            echo "<p>Assertion: $description failed with an expected value of $expected that does not match the actual value of $actual.</p>";
        }
    }
}

if (!function_exists('verifyExt')) {

    /**
     * @param $description
     * @param null $actual
     * @return object|VerifyExt
     */
    function verifyExt($description) {
        $reflect  = new ReflectionClass(VerifyExt::class);
        return $reflect->newInstanceArgs(func_get_args());
    }

    /**
     * @param $truth
     * @return array|void
     */
    function verify_thatExt($truth) {
        return verifyExt($truth)->notEmpty();
    }

    /**
     * @param $fallacy
     * @return array|void
     */
    function verify_notExt($fallacy) {
        return verifyExt($fallacy)->isEmpty();
    }
}

if (!function_exists('expectExt')) {

    /**
     * @param $description
     * @param null $actual
     * @return VerifyExt
     */
    function expectExt() {
        return call_user_func_array('verifyExt', func_get_args());
    }

    /**
     * @param $truth
     * @return array|void
     */
    function expect_thatExt($truth) {
        return expectExt($truth)->notEmpty();
    }

    /**
     * @param $fallacy
     * @return array|void
     */
    function expect_notExt($fallacy) {
        return expectExt($fallacy)->isEmpty();
    }

}

if (!function_exists('verify_fileExt')) {

    /**
     * @param $description
     * @param null $actual
     * @return \Codeception\Verify
     */
    function verify_fileExt() {
        $verify = call_user_func_array('verifyExt', func_get_args());
        $verify->setIsFileExpectation(true);
        return $verify;
    }
}

if (!function_exists('expect_fileExt')) {
    /**
     * @param $description
     * @param null $actual
     * @return VerifyExt
     */
    function expect_fileExt() {
        return call_user_func_array('verify_fileExt', func_get_args());
    }
}

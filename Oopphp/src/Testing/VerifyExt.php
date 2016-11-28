<?php

namespace Oopphp\Testing;

require_once __DIR__ . '/../../../public/bootstrap.php';
require_once __DIR__ . "/../../../vendor/codeception/verify/src/Codeception/Verify.php";

use Codeception\Verify;
use PHPUnit_Util_InvalidArgumentHelper;
use PHPUnit_Framework_Exception;
use ReflectionClass;
use ReflectionException;
use Throwable;
use Exception;
use PHPUnit_Framework_Constraint_Exception;
use PHPUnit_Framework_Constraint_ExceptionMessage;
use PHPUnit_Framework_Constraint_ExceptionMessageRegExp;
use PHPUnit_Framework_Constraint_ExceptionCode;
use PHPUnit_Framework_Constraint;
use PHPUnit_Framework_Assert as a;

/**
 * Class VerifyExt
 * @package Oopphp\Testing
 */

class VerifyExt extends Verify
{
    /**
     * @var int
     */
    private static $count = 0;
    /**
     * @var
     */
    protected $expectedException;
    /**
     * @var
     */
    protected $expectedExceptionMessageRegExp;
    /**
     * @var
     */
    protected $expectedExceptionCode;
    /**
     * @var
     */
    protected $expectedExceptionMessage;

    /**
     * @var string
     */
    protected $name = "VerifyTest";

    /**
     * @var array
     */
    protected $returnArray = [];

    /**
     * @param bool $isFileExpectation
     */
    public function setIsFileExpectation($isFileExpectation)
    {
        parent::setIsFileExpectation($isFileExpectation);
        return $this->returnArray = [
            'expected' => $isFileExpectation,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function equals($expected)
    {
        parent::equals($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function notEquals($expected)
    {
        parent::notEquals($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $needle
     */
    public function contains($needle)
    {
        parent::contains($needle);
        $this->returnArray = [
            'expected' => $needle,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $needle
     */
    public function notContains($needle)
    {
        parent::notContains($needle);
        $this->returnArray = [
            'expected' => $needle,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function greaterThan($expected)
    {
        parent::greaterThan($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function lessThan($expected)
    {
        parent::lessThan($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function greaterOrEquals($expected)
    {
        parent::greaterOrEquals($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function lessOrEquals($expected)
    {
        parent::lessOrEquals($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function true()
    {
        parent::true();
        $this->returnArray = [
            'expected' => true,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function false()
    {
        parent::false();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function null()
    {
        parent::null();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function notNull()
    {
        parent::notNull();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function isEmpty()
    {
        parent::isEmpty();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     *
     */
    public function notEmpty()
    {
        parent::notEmpty();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $key
     */
    public function hasKey($key)
    {
        parent::hasKey($key);
        $this->returnArray = [
            'expected' => $key,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $key
     */
    public function hasntKey($key)
    {
        parent::hasntKey($key);
        $this->returnArray = [
            'expected' => $key,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $class
     */
    public function isInstanceOf($class)
    {
        parent::isInstanceOf($class);
        $className = null;
        $classType = gettype($class);
        if ($classType === 'object') {
            $className = $class::name;
        } elseif ($classType === 'string') {
            $className = $class;
        }
        $this->returnArray = [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $class
     */
    public function isNotInstanceOf($class)
    {
        parent::isNotInstanceOf($class);
        $className = null;
        $classType = gettype($class);
        if ($classType === 'object') {
            $className = $class::name;
        } elseif ($classType === 'string') {
            $className = $class;
        }
        $this->returnArray = [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $type
     */
    public function internalType($type)
    {
        parent::internalType($type);
        $this->returnArray = [
            'expected' => $type,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $type
     */
    public function notInternalType($type)
    {
        parent::notInternalType($type);
        $this->returnArray = [
            'expected' => $type,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $attribute
     */
    public function hasAttribute($attribute)
    {
        parent::hasAttribute($attribute);
        $this->returnArray = [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $attribute
     */
    public function notHasAttribute($attribute)
    {
        parent::notHasAttribute($attribute);
        $this->returnArray = [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $attribute
     */
    public function hasStaticAttribute($attribute)
    {
        parent::hasStaticAttribute($attribute);
        $this->returnArray = [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $attribute
     */
    public function notHasStaticAttribute($attribute)
    {
        parent::notHasStaticAttribute($attribute);
        $this->returnArray = [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $type
     * @param null $isNativeType
     */
    public function containsOnly($type, $isNativeType = null)
    {
        parent::containsOnly($type, $isNativeType);
        $this->returnArray = [
            'expected' => $type . $isNativeType,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $type
     * @param null $isNativeType
     */
    public function notContainsOnly($type, $isNativeType = null)
    {
        parent::notContainsOnly($type, $isNativeType);
        $this->returnArray = [
            'expected' => $type . $isNativeType,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $class
     */
    public function containsOnlyInstancesOf($class)
    {
        parent::containsOnlyInstancesOf($class);
        $className = null;
        $classType = gettype($class);
        if ($classType === 'object') {
            $className = $class::name;
        } elseif ($classType === 'string') {
            $className = $class;
        }
        $this->returnArray = [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $array
     */
    public function count($array)
    {
        parent::count($array);
        $this->returnArray = [
            'expected' => $array,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $array
     */
    public function notCount($array)
    {
        parent::notCount($array);
        $this->returnArray = [
            'expected' => $array,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $xml
     * @param bool $checkAttributes
     */
    public function equalXMLStructure($xml, $checkAttributes = false)
    {
        parent::equalXMLStructure($xml, $checkAttributes);
        $this->returnArray = [
            'expected' => $xml . $checkAttributes,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function exists()
    {
        parent::exists();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function notExists()
    {
        parent::notExists();
        $this->returnArray = [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $file
     */
    public function equalsJsonFile($file)
    {
        parent::equalsJsonFile($file);
        $this->returnArray = [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $string
     */
    public function equalsJsonString($string)
    {
        parent::equalsJsonString($string);
        $this->returnArray = [
            'expected' => $string,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expression
     */
    public function regExp($expression)
    {
        parent::regExp($expression);
        $this->returnArray = [
            'expected' => $expression,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $format
     */
    public function matchesFormat($format)
    {
        parent::matchesFormat($format);
        $this->returnArray = [
            'expected' => $format,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $format
     */
    public function notMatchesFormat($format)
    {
        parent::notMatchesFormat($format);
        $this->returnArray = [
            'expected' => $format,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $formatFile
     */
    public function matchesFormatFile($formatFile)
    {
        parent::matchesFormatFile($formatFile);
        $this->returnArray = [
            'expected' => $formatFile,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $formatFile
     */
    public function notMatchesFormatFile($formatFile)
    {
        parent::notMatchesFormatFile($formatFile);
        $this->returnArray = [
            'expected' => $formatFile,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function same($expected)
    {
        parent::same($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $expected
     */
    public function notSame($expected)
    {
        parent::notSame($expected);
        $this->returnArray = [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $suffix
     */
    public function endsWith($suffix)
    {
        parent::endsWith($suffix);
        $this->returnArray = [
            'expected' => $suffix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $suffix
     */
    public function notEndsWith($suffix)
    {
        parent::notEndsWith($suffix);
        $this->returnArray = [
            'expected' => $suffix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $file
     */
    public function equalsFile($file)
    {
        parent::equalsFile($file);
        $this->returnArray = [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $file
     */
    public function notEqualsFile($file)
    {
        parent::notEqualsFile($file);
        $this->returnArray = [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $prefix
     */
    public function startsWith($prefix)
    {
        parent::startsWith($prefix);
        $this->returnArray = [
            'expected' => $prefix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $prefix
     */
    public function notStartsWith($prefix)
    {
        parent::notStartsWith($prefix);
        $this->returnArray = [
            'expected' => $prefix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $file
     */
    public function equalsXmlFile($file)
    {
        parent::equalsXmlFile($file);
        $this->returnArray = [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param $xmlString
     */
    public function equalsXmlString($xmlString)
    {
        parent::equalsXmlString($xmlString);
        $this->returnArray = [
            'expected' => $xmlString,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @param mixed  $exception
     * @param string $messageRegExp
     * @param int    $code
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 4.3.0
     *
     * @deprecated Method deprecated since Release 5.6.0
     */
    public function setExpectedExceptionRegExp($exception, $messageRegExp = '', $code = null)
    {
        if (!is_string($messageRegExp)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $this->expectedException              = $exception;
        $this->expectedExceptionMessageRegExp = $messageRegExp;

        if ($code !== null) {
            $this->expectExceptionCode($code, false);
        }
        return $this->runExceptions();
    }

    /**
     * @param string $exception
     *
     * @since Method available since Release 5.2.0
     */
    public function expectException($exception)
    {
        if (!is_string($exception)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }
        $this->expectedException = $exception;
        return $this->runExceptions();
    }

    /**
     * @param int|string $code
     * @param bool $runCode
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 5.2.0
     */
    public function expectExceptionCode($code, $runCode = true)
    {
        if (!is_int($code) && !is_string($code)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer or string');
        }

        $this->expectedExceptionCode = $code;
        if ($runCode) {
            return $this->runExceptions();
        }
    }

    /**
     * @param string $message
     * @param bool $runCode
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 5.2.0
     */
    public function expectExceptionMessage($message, $runCode = true)
    {
        if (!is_string($message)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }
        $this->expectedExceptionMessage = $message;
        if ($runCode) {
            return $this->runExceptions();
        }
    }

    /**
     * @param string $messageRegExp
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 5.2.0
     */
    public function expectExceptionMessageRegExp($messageRegExp)
    {
        if (!is_string($messageRegExp)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $this->expectedExceptionMessageRegExp = $messageRegExp;
        return $this->runExceptions();
    }

    /**
     * Evaluates a PHPUnit_Framework_Constraint matcher object.
     *
     * @param mixed                        $value
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $message
     *
     * @since Method available since Release 3.0.0
     */
    public function assertThat($value, PHPUnit_Framework_Constraint $constraint, $message = '')
    {
        self::$count += count($constraint);

        $constraint->evaluate($value, $message);
    }

    /**
     * @return $this
     * @throws Throwable
     */
    protected function runExceptions()
    {
        $testResult = null;
        try {
            $methodName = $this->actual;
            if (is_callable($methodName)) {
                $testResult = $methodName();
            }
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }


        if (isset($e)) {
            $checkException = false;

            if (is_string($this->expectedException)) {
                $checkException = true;

                if ($e instanceof PHPUnit_Framework_Exception) {
                    $checkException = false;
                }

                $reflector = new ReflectionClass($this->expectedException);

                if ($this->expectedException == 'PHPUnit_Framework_Exception' ||
                    $reflector->isSubclassOf('PHPUnit_Framework_Exception')) {
                    $checkException = true;
                }
            }

            if ($checkException) {
                $this->assertThat(
                    $e,
                    new PHPUnit_Framework_Constraint_Exception(
                        $this->expectedException
                    )
                );

                if (is_string($this->expectedExceptionMessage) &&
                    !empty($this->expectedExceptionMessage)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessage(
                            $this->expectedExceptionMessage
                        )
                    );
                }

                if (is_string($this->expectedExceptionMessageRegExp) &&
                    !empty($this->expectedExceptionMessageRegExp)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessageRegExp(
                            $this->expectedExceptionMessageRegExp
                        )
                    );
                }

                if ($this->expectedExceptionCode !== null) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionCode(
                            $this->expectedExceptionCode
                        )
                    );
                }

                $this->returnArray = [
                    'expected' => $this->expectedException,
                    'actual' => $e,
                    'description' => $this->description
                ];
                return $this;
            } else {
                throw $e;
            }
        }

        $this->returnArray = [
            'expected' => $this->expectedException,
            'actual' => $this->actual,
            'description' => $this->description
        ];
        return $this;
    }

    /**
     * @return array
     */
    public function getReturnArray() : array
    {
        return $this->returnArray;
    }

    /**
     * @param bool $weakComparison
     */
    public function printAssertion(bool $weakComparison = false)
    {
        $assertion = $this->getReturnArray();
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

        if (!is_scalar($expected) && $expected !== null) {
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

        if (!is_scalar($actual) && null !== $actual) {
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
        // null fails is scalar
        if (!is_scalar($description) && $description !== null) {
            $actual = "Type of " . gettype($description) . " Not coercible";
        }
        if ($matches) {
            echo "<p class='alert alert-success'><strong>Assertion:</strong> $description passed with an expected value of <var>$expected</var> that matches the actual value of <var>$actual</var>.</p>";
        }
        if (!$matches) {
            echo "<p class='alert alert-danger'><strong>Assertion:</strong> $description failed with an expected value of <var>$expected</var> that does not match the actual value of <var>$actual</var>.</p>";
        }
        return $this;
    }

    /**
     * @param bool $weakComparison
     * @return VerifyExt
     */
    public function e(bool $weakComparison = false)
    {
        return $this->printAssertion($weakComparison);
    }
}

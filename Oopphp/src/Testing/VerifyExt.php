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
     * @param bool $isFileExpectation
     */
    public function setIsFileExpectation($isFileExpectation)
    {
        parent::setIsFileExpectation($isFileExpectation);
        return [
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
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function notEquals($expected)
    {
        parent::notEquals($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $needle
     */
    public function contains($needle)
    {
        parent::contains($needle);
        return [
            'expected' => $needle,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $needle
     */
    public function notContains($needle)
    {
        parent::notContains($needle);
        return [
            'expected' => $needle,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function greaterThan($expected)
    {
        parent::greaterThan($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function lessThan($expected)
    {
        parent::lessThan($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function greaterOrEquals($expected)
    {
        parent::greaterOrEquals($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function lessOrEquals($expected)
    {
        parent::lessOrEquals($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function true()
    {
        parent::true();
        return [
            'expected' => true,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function false()
    {
        parent::false();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function null()
    {
        parent::null();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function notNull()
    {
        parent::notNull();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function isEmpty()
    {
        parent::isEmpty();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     *
     */
    public function notEmpty()
    {
        parent::notEmpty();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $key
     */
    public function hasKey($key)
    {
        parent::hasKey($key);
        return [
            'expected' => $key,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $key
     */
    public function hasntKey($key)
    {
        parent::hasntKey($key);
        return [
            'expected' => $key,
            'actual' => $this->actual,
            'description' => $this->description
        ];
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
        return [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
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
        return [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $type
     */
    public function internalType($type)
    {
        parent::internalType($type);
        return [
            'expected' => $type,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $type
     */
    public function notInternalType($type)
    {
        parent::notInternalType($type);
        return [
            'expected' => $type,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $attribute
     */
    public function hasAttribute($attribute)
    {
        parent::hasAttribute($attribute);
        return [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $attribute
     */
    public function notHasAttribute($attribute)
    {
        parent::notHasAttribute($attribute);
        return [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $attribute
     */
    public function hasStaticAttribute($attribute)
    {
        parent::hasStaticAttribute($attribute);
        return [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $attribute
     */
    public function notHasStaticAttribute($attribute)
    {
        parent::notHasStaticAttribute($attribute);
        return [
            'expected' => $attribute,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $type
     * @param null $isNativeType
     */
    public function containsOnly($type, $isNativeType = null)
    {
        parent::containsOnly($type, $isNativeType);
        return [
            'expected' => $type . $isNativeType,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $type
     * @param null $isNativeType
     */
    public function notContainsOnly($type, $isNativeType = null)
    {
        parent::notContainsOnly($type, $isNativeType);
        return [
            'expected' => $type . $isNativeType,
            'actual' => $this->actual,
            'description' => $this->description
        ];
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
        return [
            'expected' => $className,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $array
     */
    public function count($array)
    {
        parent::count($array);
        return [
            'expected' => $array,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $array
     */
    public function notCount($array)
    {
        parent::notCount($array);
        return [
            'expected' => $array,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $xml
     * @param bool $checkAttributes
     */
    public function equalXMLStructure($xml, $checkAttributes = false)
    {
        parent::equalXMLStructure($xml, $checkAttributes);
        return [
            'expected' => $xml . $checkAttributes,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @throws \Exception
     */
    public function exists()
    {
        parent::exists();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @throws \Exception
     */
    public function notExists()
    {
        parent::notExists();
        return [
            'expected' => null,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $file
     */
    public function equalsJsonFile($file)
    {
        parent::equalsJsonFile($file);
        return [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $string
     */
    public function equalsJsonString($string)
    {
        parent::equalsJsonString($string);
        return [
            'expected' => $string,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expression
     */
    public function regExp($expression)
    {
        parent::regExp($expression);
        return [
            'expected' => $expression,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $format
     */
    public function matchesFormat($format)
    {
        parent::matchesFormat($format);
        return [
            'expected' => $format,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $format
     */
    public function notMatchesFormat($format)
    {
        parent::notMatchesFormat($format);
        return [
            'expected' => $format,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $formatFile
     */
    public function matchesFormatFile($formatFile)
    {
        parent::matchesFormatFile($formatFile);
        return [
            'expected' => $formatFile,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $formatFile
     */
    public function notMatchesFormatFile($formatFile)
    {
        parent::notMatchesFormatFile($formatFile);
        return [
            'expected' => $formatFile,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function same($expected)
    {
        parent::same($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $expected
     */
    public function notSame($expected)
    {
        parent::notSame($expected);
        return [
            'expected' => $expected,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $suffix
     */
    public function endsWith($suffix)
    {
        parent::endsWith($suffix);
        return [
            'expected' => $suffix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $suffix
     */
    public function notEndsWith($suffix)
    {
        parent::notEndsWith($suffix);
        return [
            'expected' => $suffix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $file
     */
    public function equalsFile($file)
    {
        parent::equalsFile($file);
        return [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $file
     */
    public function notEqualsFile($file)
    {
        parent::notEqualsFile($file);
        return [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $prefix
     */
    public function startsWith($prefix)
    {
        parent::startsWith($prefix);
        return [
            'expected' => $prefix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $prefix
     */
    public function notStartsWith($prefix)
    {
        parent::notStartsWith($prefix);
        return [
            'expected' => $prefix,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $file
     */
    public function equalsXmlFile($file)
    {
        parent::equalsXmlFile($file);
        return [
            'expected' => $file,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param $xmlString
     */
    public function equalsXmlString($xmlString)
    {
        parent::equalsXmlString($xmlString);
        return [
            'expected' => $xmlString,
            'actual' => $this->actual,
            'description' => $this->description
        ];
    }

    /**
     * @param mixed      $exception
     * @param string     $message
     * @param int|string $code
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since      Method available since Release 3.2.0
     * @deprecated Method deprecated since Release 5.2.0
     */
    public function setExpectedException($exception, $message = '', $code = null)
    {
        $this->expectedException = $exception;

        if ($message !== null && $message !== '') {
            $this->expectExceptionMessage($message, false);
        }

        if ($code !== null) {
            $this->expectExceptionCode($code, false);
        }
        return $this->runExceptions();
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
     * @return null
     * @throws Throwable
     */
    protected function runExceptions()
    {
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

                return [
                    'expected' => $this->expectedException,
                    'actual' => $this->expectedException,
                    'description' => $this->description
                ];
            } else {
                throw $e;
            }
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
                new PHPUnit_Framework_Constraint_Exception(
                    $this->expectedException
                )
            );
        }
        /**
         * $this->expectedException = $exception;

        if ($message !== null && $message !== '') {
        $this->expectExceptionMessage($message, false);
        }

        if ($code !== null) {
        $this->expectExceptionCode($code, false);
        }
         */

        return [
            'expected' => $this->expectedException,
            'actual' => $testResult,
            'description' => $this->description
        ];

    }
}

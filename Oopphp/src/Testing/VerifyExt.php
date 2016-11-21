<?php

namespace Oopphp\Testing;

require_once __DIR__ . '/../../../public/bootstrap.php';
require_once __DIR__ . "/../../../vendor/codeception/verify/src/Codeception/Verify.php";

use Codeception\Verify;

/**
 * Class VerifyExt
 * @package Oopphp\Testing
 */

class VerifyExt extends Verify
{
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

}

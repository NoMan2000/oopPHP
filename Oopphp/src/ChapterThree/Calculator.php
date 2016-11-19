<?php

namespace Oopphp\ChapterThree;

use Oopphp\Contracts\OperationContract;
use Oopphp\Contracts\SubtractContract;
use InvalidArgumentException;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class Calculator
 * @package Oopphp\ChapterThree
 */
class Calculator implements OperationContract
{
    /**
     * @var SubtractContract
     */
    protected $subtractClass;

    /**
     * Calculator constructor.
     * @param SubtractContract $subtractClass
     */
    public function __construct(SubtractContract $subtractClass)
    {
        $this->subtractClass = $subtractClass;
    }

    /**
     * @param string $operation
     * @param int $returnType
     * @param ...$args
     * @return int|float|InvalidArgumentException
     * @throws InvalidArgumentException
     */
    public function calc(string $operation, int $returnType = self::INT, ...$args)
    {
        if ($operation === '-') {
            return $this->subtractOperation($returnType, $args);
        }
        if ($operation === '+') {
            return $this->addOperation($returnType, $args);
        }
        return $this->badOperation($operation);
    }

    /**
     * @param int $returnType
     * @param array $args
     * @return float|int|InvalidArgumentException
     * @throws InvalidArgumentException
     */
    protected function subtractOperation(int $returnType, array $args)
    {
        if ($returnType === self::INT) {
            return $this->subtractClass->subtractInt(...$args);
        }
        if ($returnType === self::FLOAT) {
            return $this->subtractClass->subtractFloat(...$args);
        }
        return $this->badReturnType($returnType);
    }

    /**
     * @param int $returnType
     * @param array $args
     * @return float|int|InvalidArgumentException
     * @throws InvalidArgumentException
     */
    protected function addOperation(int $returnType, array $args)
    {
        if ($returnType === self::INT) {
            return $this->subtractClass->addInt(...$args);
        }
        if ($returnType === self::FLOAT) {
            return $this->subtractClass->addFloat(...$args);
        }
        return $this->badReturnType($returnType);
    }

    /**
     * @param int $returnType
     * @throws InvalidArgumentException
     */
    protected function badReturnType(int $returnType)
    {
        throw new InvalidArgumentException("Return type of $returnType is not recognized", self::BAD_RETURN_TYPE);
    }

    /**
     * @param string $operation
     * @throws InvalidArgumentException
     */
    protected function badOperation(string $operation)
    {
        throw new InvalidArgumentException("Invalid operation of $operation", self::BAD_OPERATION);
    }

}

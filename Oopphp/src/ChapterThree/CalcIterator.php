<?php

namespace Oopphp\ChapterThree;

use Oopphp\Contracts\IteratorContract;
use Oopphp\Contracts\OperationContract;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class CalcIterator
 * @package Oopphp\ChapterThree
 */
class CalcIterator implements IteratorContract
{
    /**
     * @var array
     */
    protected $itemList = [];

    /**
     * @var Calculator
     */
    protected $operationClass;


    /**
     * CalcIterator constructor.
     * @param array $items
     * @param OperationContract|null $operationClass
     */
    public function __construct(array $items = [], OperationContract $operationClass = null)
    {
        $this->itemList = $items;
        $this->operationClass = $operationClass ?: new Calculator(new SubtractCalc(new AddCalc()));
    }

    /**
     * @param string $operation
     * @param int $returnType
     * @return float|int|\InvalidArgumentException
     */
    public function calc(string $operation, int $returnType = OperationContract::INT)
    {
        return $this->operationClass->calc($operation, $returnType, ...$this->itemList);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->itemList);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->itemList);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->itemList);
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return current($this->itemList);
    }

    /**
     * @return mixed
     */
    public function rewind()
    {
        return reset($this->itemList);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return count($this->itemList);
    }

    /**
     * @return Calculator
     */
    public function getOperationClass(): Calculator
    {
        return $this->operationClass;
    }

    /**
     * @param Calculator $operationClass
     * @return CalcIterator
     */
    public function setOperationClass(Calculator $operationClass): CalcIterator
    {
        $this->operationClass = $operationClass;
        return $this;
    }

    /**
     * @return array
     */
    public function getItemList(): array
    {
        return $this->itemList;
    }
}

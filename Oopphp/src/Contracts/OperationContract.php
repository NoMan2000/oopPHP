<?php

namespace Oopphp\Contracts;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Interface OperationContract
 * @package Oopphp\Contracts
 */
interface OperationContract
{
    /**
     *
     */
    const INT = 0;

    /**
     *
     */
    const FLOAT = 1;

    /**
     *
     */
    const BAD_OPERATION = 1000;

    /**
     *
     */
    const BAD_RETURN_TYPE = 1001;

    /**
     * OperationContract constructor.
     * @param SubtractContract $subtractClass
     */
    public function __construct(SubtractContract $subtractClass);

    /**
     * @param string $operation
     * @param int $returnType
     * @param ...$args
     * @return int|float
     */
    public function calc(string $operation, int $returnType = self::INT, ...$args);
}

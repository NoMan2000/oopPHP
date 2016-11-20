<?php

namespace Oopphp\Contracts;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Interface UserContract
 * @package Oopphp\Contracts
 */
interface UserContract
{
    /**
     * @param int $id
     * @return mixed
     */
    public function setID(int $id);
    /**
     * @param string $name
     * @return mixed
     */
    public function setUsername(string $name);
    /**
     * @return string
     */
    public function getUsername() : string;

    /**
     * @return int
     */
    public function getID() : int;
}

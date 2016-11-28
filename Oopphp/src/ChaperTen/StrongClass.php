<?php
declare(strict_types = 1);

namespace Oopphp\ChaperTen;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Everything is the same except the type declaration above.
 * Class StrongClass
 * @package Oopphp\ChaperTen
 */
class StrongClass extends WeakClass
{
    /**
     * @param $var
     * @return int
     */
    public function getInt($var) : int
    {
        return $var;
    }

    /**
     * @param $var
     * @return int
     */
    public function getCoerciveInt($var) : int
    {
        return intval($var);
    }

    /**
     * @param int $var
     * @return int
     */
    public function getTypedInt(int $var) : int
    {
        return $var;
    }

    /**
     * @param $var
     * @return float
     */
    public function getFloat($var) : float
    {
        return $var;
    }

    /**
     * @param $var
     * @return float
     */
    public function getCoerciveFloat($var) : float
    {
        return floatval($var);
    }

    /**
     * @param float $var
     * @return float
     */
    public function getTypedFloat(float $var) : float
    {
        return $var;
    }

    /**
     * @param $var
     * @return string
     */
    public function getString($var) : string
    {
        return $var;
    }

    /**
     * @param $var
     * @return string
     */
    public function getCoerciveString($var) : string
    {
        return strval($var);
    }

    /**
     * @param string $var
     * @return string
     */
    public function getTypedString(string $var) : string
    {
        return $var;
    }

    /**
     * @param $var
     * @return bool
     */
    public function getBool($var) : bool
    {
        return $var;
    }

    /**
     * @param $var
     * @return bool
     */
    public function getCoerciveBool($var) : bool
    {
        return boolval($var);
    }

    /**
     * @param bool $var
     * @return bool
     */
    public function getTypedBool(bool $var) : bool
    {
        return $var;
    }

    /**
     * @return mixed
     */
    public function getClassToString()
    {
        return parent::getClassToString();
    }

}

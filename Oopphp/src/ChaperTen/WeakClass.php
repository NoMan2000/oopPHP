<?php
namespace Oopphp\ChaperTen;


/**
 * Class WeakClass
 * @package Oopphp\ChaperTen
 */
/**
 * Class WeakClass
 * @package Oopphp\ChaperTen
 */
class WeakClass
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
     * Code similar to how developers in PHP5 handled this
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
     * Code similar to how developers in PHP5 handled this
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
     * Code similar to how developers in PHP5 handled this
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
     * Code similar to how developers in PHP5 handled this
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
     * @return object
     */
    public function getClassToString()
    {
        return new class {
            /**
             * @return string
             */
            public function __toString()
            {
                return 'string';
            }
        };
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: michaelsoileau
 * Date: 11/19/16
 * Time: 5:47 PM
 */

namespace Oopphp\Traits;


/**
 * Class SingletonTrait
 * @package Oopphp\Traits
 */
trait SingletonTrait
{
    /**
     * @var
     */
    protected static $instance;
    /**
     * @return static
     */
    public static function getInstance()
    {
        return static::$instance = static::$instance ?: new static();
    }

    /**
     * SingletonTrait constructor.
     */
    private function __construct()
    {

    }

    /**
     *
     */
    private function __wakeup()
    {

    }

    /**
     *
     */
    private function __sleep()
    {

    }

    /**
     *
     */
    private function __clone()
    {

    }
}

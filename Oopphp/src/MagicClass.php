<?php

namespace Oopphp;
use stdClass;

require_once __DIR__ . '/../../public/bootstrap.php';

/**
 * Class MagicClass
 * @package Oopphp
 */
class MagicClass
{

    /**
     * @var \stdClass
     */
    protected $items;

    /**
     * @var int
     */
    protected $thing = 1;

    /**
     * @var int
     */
    protected $thingTwo = 2;

    /**
     * @var string
     */
    protected static $name = self::class;

    /**
     * MagicClass constructor.
     * @param stdClass $items
     */
    public function __construct(\stdClass $items)
    {
        echo "Creating the Object!" . PHP_EOL;
        $this->items = $items;
    }

    /**
     *
     */
    public function __destruct()
    {
        echo "Destroying the Object!" . PHP_EOL;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->items->$name)) {
            return $this->items->$name->__invoke($arguments);
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return static::getName();
    }

    /**
     * @param string $name
     */
    function __get($name)
    {
        return isset($this->items->$name) ? $this->items->$name : '';
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    function __set(string $name, $value)
    {
        $this->items->$name = $value;
    }

    /**
     * @param string $name
     */
    function __isset(string $name)
    {
        return isset($this->items->$name);
    }

    /**
     * @param string $name
     */
    function __unset(string $name)
    {
        unset($this->items->$name);
    }

    /**
     * Called when serialize is called on this object
     * Ask for the member parameters of an object
     * Very similar to compact
     * @return array
     */
    function __sleep()
    {
        return ['thing', 'thingTwo'];
    }

    /**
     * Called when unserialize is used
     * Note that for both __sleep and __wakeup, a better interface called "Serializable" is available to
     * give finer grain control over the process.
     */
    function __wakeup()
    {
        echo "Unserializing the Data!" . PHP_EOL;
    }

    /**
     *
     */
    function __toString()
    {
        return "String method called";
    }

    /**
     *
     */
    function __invoke(callable $fn)
    {
        return $fn();
    }

    /**
     *
     */
    function __debugInfo()
    {
        return (array) $this->items;
    }

    /**
     * @param array $arr
     * @return array
     */
    public static function __set_state(array $arr)
    {
        foreach (get_object_vars(static::class) as $name => $item) {
            $arr[$name] = $item;
        }
        return $arr;
    }

    /**
     *
     */
    function __clone()
    {
        return new static($this->items);
    }

    /**
     * @return string
     */
    public function getRandom()
    {
        return "random";
    }

    /**
     * @return mixed
     */
    public static function getName()
    {
        return static::$name;
    }

}

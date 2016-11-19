<?php

namespace Oopphp\ChapterSix;

require_once __DIR__ . '/../../../public/bootstrap.php';

use stdClass;
use InvalidArgumentException;

/**
 * Class MagicMethodsClass
 * @package Oopphp\ChapterSix
 */
class MagicMethodsClass
{

    /**
     * @var \stdClass
     */
    protected $items;

    /**
     * @var int
     */
    public $thing = 1;

    /**
     * @var int
     */
    public $thingTwo = 2;

    /**
     * @var array
     */
    protected $connectionItems = [];

    /**
     * @var string
     */
    protected static $name = self::class;

    /**
     * MagicClass constructor.
     * Called whenever new MagicMethodsClass is constructed
     * @param stdClass $items
     */
    public function __construct(\stdClass $items)
    {
        $this->items = $items;
    }

    /**
     * Called whenever no more references to the object exist.  PHP performs automatic garbage collection,
     * so this is called by PHP internally.
     */
    public function __destruct()
    {
        $this->closeConnectionItemsOnDestroy();
    }

    /**
     * Whenever a method is invoked on the object that does not exist, this task executes.
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->items->$name)) {
            return $this->items->$name->__invoke(...$arguments);
        }
        throw new InvalidArgumentException("method $name does not exist in the class");
    }

    /**
     * Whenever a static method is called that does not exist, this method gets invoked
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return static::getName();
    }

    /**
     * Whenever an attempt to access a property that does not exist on an object, this method is run.
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return isset($this->items->$name) ? $this->items->$name : '';
    }

    /**
     * Whenever an attempt to set a property that does not exist on an object, this method is run.
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        $this->items->$name = $value;
    }

    /**
     * Whenever an attempt to check if a property that does not exist on an object exists, this method is run.
     * @param string $name
     */
    public function __isset(string $name)
    {
        return isset($this->items->$name);
    }

    /**
     * Whenever an attempt to check if a property that does not exist on an object exists, this method is run.
     * @param string $name
     */
    public function __unset(string $name)
    {
        unset($this->items->$name);
    }

    /**
     * Called when serialize is called on this object
     * Ask for the member parameters of an object
     * Very similar to compact
     * @return array
     */
    public function __sleep() : array
    {
        return ['thing', 'thingTwo'];
    }

    /**
     * Called when unserialize is used
     * Note that for both __sleep and __wakeup, a better interface called "Serializable" is available to
     * give finer grain control over the process.
     */
    public function __wakeup()
    {
        $this->setConnectionItemsOnWakeup();
    }

    /**
     * Called when the object is accessed as a string or cast to a string.
     */
    public function __toString() : string
    {
        return self::class;
    }

    /**
     * Called whenever the object is invoked as a method
     */
    public function __invoke(callable $fn)
    {
        return $fn();
    }

    /**
     * Called whenever "var_dump" is used on an object.
     */
    public function __debugInfo()
    {
        return (array) $this->items;
    }

    /**
     * Called whenever var_export is used on an object
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
     * Clone is called when an object is cloned.  PHP does not re-initialize the constructor method whenever a clone is made,
     * the clone is made as is.  To initialize a clone with a constructor, you have to specify this method.
     */
    public function __clone()
    {
        return new static($this->items);
    }

    /**
     * @return mixed
     */
    public static function getName()
    {
        return static::$name;
    }

    /**
     * @return array
     */
    public function getConnectionItems()
    {
        return $this->connectionItems;
    }

    /**
     * @return $this
     */
    protected function closeConnectionItemsOnDestroy()
    {
        $this->connectionItems = [
            'db' => 'disconnect',
            'file' => 'unlink'
        ];
        return $this;
    }

    /**
     * @return $this
     */
    protected function setConnectionItemsOnWakeup()
    {
        $this->connectionItems = [
            'db' => 'connect',
            'file' => 'load'
        ];
        return $this;
    }

}

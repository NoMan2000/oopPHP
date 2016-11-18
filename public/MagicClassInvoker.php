<?php

require_once __DIR__ . '/bootstrap.php';

use Oopphp\MagicClass;

$l = PHP_EOL;

echo MagicClass::getUnknown() . $l; // Invoking the __callStatic method
$x = new stdClass();
$x->func = function () {
    return "An anonymous function";
};
$x->prop = "prop";
$magicClass = new MagicClass($x); // Invoking the __construct method

echo $magicClass->func() . $l; // Invoking the __call method
echo $magicClass->prop . $l; // Invoking the __get method
$x = serialize($magicClass) . $l; // Invoking the __sleep method
echo $x;
unserialize($x); // Invoking the __wakeup method.  Notice that waking up will destroy the object
dump(isset($magicClass->prop)); // Invoking the __isset method
$magicClass->newThing = "A new Thing" . PHP_EOL; // Invoking the __set method
echo $magicClass->newThing; // Invoking the __get method
unset($magicClass->newThing); // Invoking the __unset method
dump(isset($magicClass->newThing)); // Invoking the __isset method

$randomFunc = function () {
    return ucwords("some string");
};
echo $magicClass($randomFunc) . $l; // Invoking the __invoke method

echo $magicClass . $l; // Invoking the __toString method

$newMagicClass = clone($magicClass); // Invoking the __clone method

var_dump($magicClass); // Invoking the __debugInfo method

echo var_export($magicClass, true) . $l; // Invoking the __set_state

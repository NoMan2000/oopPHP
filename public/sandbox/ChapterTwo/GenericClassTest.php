<?php

require_once __DIR__ . '/../../bootstrap.php';

use Oopphp\ChapterTwo\GenericClass;

/**
 * @return GenericClass
 */
$before =  function() {
    return new GenericClass();
};

callBackAssertion(
    "Should have a default int value of 0",
    $before()->getIntProperty() === 0,
    '$before()->getIntProperty()');

callBackAssertion(
    "Should return the class back as a fluent method",
    $before()->setIntProperty(10) instanceof GenericClass,
    '$before()->setIntProperty(10) instanceof GenericClass'
);

callBackAssertion(
    "Should be able to set and retrieve an integer value",
    (function (callable $before) {
        /**
         * @var $class GenericClass
         */
        $class = $before();
        $class->setIntProperty(14);
        return $class->getIntProperty();
    })($before) === 14,
    '(function(callable $before) {
        $before()->setIntProperty(14);
        return $before()->getIntProperty();
    })($before) === 14'
);


<?php

require_once __DIR__ . '/../../bootstrap.php';

use Oopphp\ChapterOne\Beginner;

/**
 * @return Beginner
 */
$getClass = function () {
    return new Beginner();
};

callBackAssertion("Should evaluate true as true", $getClass()->isTrue() === true, '$getClass()->isTrue() === true');
callBackAssertion("Should evaluate false as false", $getClass()->isFalse() === false, '$getClass()->isFalse() === false');
callBackAssertion("Should evaluate the passed in boolean as a boolean", $getClass()->isBool(true) === true, '$getClass()->isBool(true) === true');
callBackAssertion("Should evaluate the passed in boolean as a boolean", $getClass()->isBool(false) === false, '$getClass()->isBool(false) === false');

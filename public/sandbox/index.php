<?php

require_once __DIR__ . '/bootstrap.php';

use Oopphp\ChapterThree\{ClassConstantOne, ClassConstantTwo};

// Play in your sandbox
assert(ClassConstantOne::CONSTANT_ONE === 1, "Can override a class constant, but not an interface constant");
assert(ClassConstantTwo::CONSTANT_ONE === 'one', "Can override a class constant, but not an interface constant");


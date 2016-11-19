<?php

use Oopphp\ChapterThree\ClassConstantOne;
use Oopphp\ChapterThree\ClassConstantTwo;

require_once __DIR__ . '/../../bootstrap.php';

define("A class constant can be overridden by another class", function () {

    beforeEach(function () {
        $this->one = ClassConstantOne::CONSTANT_ONE;
        $this->two = ClassConstantTwo::CONSTANT_ONE;
    });

    it("Can override a class constant, but not an interface constant", function () {

        expect($this->one)->toBe(1);
        expect()->toBe('one');
    });
});

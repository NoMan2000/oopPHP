<?php

namespace ChapterSix;

use Codeception\Specify;
use Oopphp\ChapterSix\ToString;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return ToString
 */
$before = function() {
    return new ToString();
};

specify($statement = "Casting an object as a string will return the __toString method", function () use($statement, $before) {
    /**
     * @var $toStringClass ToString
     */
    $toStringClass = $before();
    verifyExt(
        $statement . '<code>$this->toStringClass</code>',
        strval($toStringClass)
    )->equals("test string")->e();
});



if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

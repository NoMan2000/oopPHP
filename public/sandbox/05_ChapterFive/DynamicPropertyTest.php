<?php

namespace ChapterFive;

use Oopphp\ChapterFive\DynamicProperty;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Dynamic Property Test";
require_once __DIR__ . '/../partials/header.php';

/**
 * @return DynamicProperty
 */
$before = function() {
    return new DynamicProperty();
};

specify($statement = "Can get a dynamic property", function () use($statement, $before) {
    /**
     * @var $dynamicPropClass DynamicProperty
     */
    $dynamicPropClass = $before();
    verifyExt(
        $statement . '<code>$dynamicPropClass->getDynamicProperty()</code>',
        $dynamicPropClass->getDynamicProperty()
    )->equals("bad")->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

<?php
namespace ChapterFive;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Out of Scope Test";
require_once __DIR__ . '/../partials/header.php';

use Codeception\Specify;
use Oopphp\ChapterFive\OutOfScopeReference;

/**
 * @return OutOfScopeReference
 */
$before = function() {
    return new OutOfScopeReference();
};


/**
 * Please never do this, but you can pass by reference with a magic __get method
 */
specify($statement = "Can get and set a value dynamically", function () use ($statement, $before)  {
    /**
     * @var $outOfScopeReference OutOfScopeReference
     */
    $outOfScopeReference = $before();
    $outOfScopeReference->foo = "Jack";
    $bad =& $outOfScopeReference->foo;
    $outOfScopeReference->foo = 'Me';
    verifyExt(
        $statement . '<code>$outOfScopeReference->foo = "Jack";
                    $bad =& $outOfScopeReference->foo;
                    $outOfScopeReference->foo = \'Me\';</code>',
        $bad
    )->equals("Me")->e();
});

specify($statement = "Can still retrieve null", function () use ($statement, $before) {
    /**
     * @var $outOfScopeReference OutOfScopeReference
     */
    $outOfScopeReference = $before();
    $x = $outOfScopeReference->foo;
    verifyExt(
        $statement . '<code>$outOfScopeReference->foo</code>',
        $x
    )->equals(null)->e();
});



if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

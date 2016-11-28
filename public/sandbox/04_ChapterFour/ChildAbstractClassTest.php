<?php
namespace ChapterFour;

use Codeception\Specify;
use Oopphp\ChapterFour\ChildAbstractClass;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Child Abstract Class Test";
require_once __DIR__ . '/../partials/header.php';


/**
 * @return ChildAbstractClass
 */
$before = function() {
    return new ChildAbstractClass();
};

specify($statement = "Can get the parent class's methods", function () use ($statement, $before) {
    /**
     * @var $childClass ChildAbstractClass
     */
    $childClass = $before();
    verifyExt(
        $statement . ' <code>$childClass->getFinalFunction()</code>',
        $childClass->getFinalFunction()
    )->equals("This is the final function")->e();
});

specify($statement = "Can extend a parent's methods and use a default value on a protected variable", function ()  use ($before, $statement) {
    /**
     * @var $childClass ChildAbstractClass
     */
    $childClass = $before();
    verifyExt(
        $statement . ' <code>$childClass->getMyVariable()</code>',
        $childClass->getMyVariable()
    )->equals("var")->e();
});

specify($statement = "Can implement an abstract method", function () use($before, $statement){
    /**
     * @var $childClass ChildAbstractClass
     */
    $childClass = $before();
    $childClass->setHiddenVariable('hidden');
    $childClass->setMyVariable('test');
    $data = $childClass->getData();
    verifyExt($data['privateVariable'])->equals('hidden')->e();
    verifyExt($data['protectedVariable'])->equals('test')->e();
});
if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

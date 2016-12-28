<?php
namespace ChapterNine;
use Codeception\Specify;
use Oopphp\ChapterNine\UserClassGenerator;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * @return UserClassGenerator
 */
$before = function () {
    return new UserClassGenerator([
        'Username' => 'john',
        'ID' => 100
    ]);
};

specify($statement = "An anonymous class can implement the correct contract", function () use ($before, $statement) {
    /**
     * @var $userGenerator UserClassGenerator
     */
    $userGenerator = $before();
    verifyExt(
        $statement . '<code>$userGenerator->getClass()->getID()</code>',
        $userGenerator->getClass()->getID())->equals(100)->e();
    verifyExt(
        $statement . '<code>$userGenerator->getClass()->getUsername()</code>',
        $userGenerator->getClass()->getUsername()
    )->equals('john')->e();
});


if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

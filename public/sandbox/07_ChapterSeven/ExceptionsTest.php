<?php
namespace ChapterSeven;

use Codeception\Specify;
use Oopphp\Exceptions\ErrorExceptionHandler;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

(new ErrorExceptionHandler()); // Anonymous self-invoking class

specify($statement = "Can convert an error into an exception", function () use ($statement) {
    try {
        trigger_error("You did something bad");
    } catch (\Exception $e) {
        verifyExt($e)->isInstanceOf(\ErrorException::class)->e();
    } catch (\Throwable $t) {

    }
});

specify($statement = "Can suppress an error", function () use ($statement) {
    $error = false;
    try {
        // trigger_error will always return true unless you set the second argument to an invalid type.
        $error = @trigger_error("This is something really stupid to do");
    } catch (\Throwable $t) {

    }
    verifyExt($error)->equals(true)->e();
});




if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

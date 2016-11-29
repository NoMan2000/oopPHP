<?php
namespace ChapterEight;

use Codeception\Specify;
use Oopphp\ChapterEight\Auth;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return Auth
 */
$before = function() {
    $auth = new Auth();
    $logFile = $auth->getFileLocation();
    $logFileExists = file_exists($logFile);
    if ($logFileExists) {
        file_put_contents($logFile, '');
    }
    if (!$logFileExists) {
        touch($logFile);
    }
    return $auth;
};


specify($statement = "Can output a successful login", function () use($statement, $before) {
    /**
     * @var $authClass Auth
     */
    $authClass = $before();
    $authClass->successAuth(122);
    $fileLocation = $authClass->getFileLocation();
    $contents = file_get_contents($fileLocation);
    verifyExt($contents)->contains('122')->e();
});


specify($statement = "Can output a failed login", function () use ($before, $statement) {
    /**
     * @var $authClass Auth
     */
    $authClass = $before();
    $authClass->failAuth(122);
    $fileLocation = $authClass->getFileLocation();
    $contents = file_get_contents($fileLocation);
    verifyExt($contents)->contains('122')->e();
});


specify($statement = "Can set File Location", function () use ($before, $statement) {
    /**
     * @var $authClass Auth
     */
    $authClass = $before();
    $fileLocation = $authClass->getFileLocation();
    $authClass->setFileLocation($fileLocation);
    $newFileLocation = $authClass->getFileLocation();
    verifyExt($newFileLocation)->equals($fileLocation)->e();
});


if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

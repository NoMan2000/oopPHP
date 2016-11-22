<?php

require_once __DIR__ . '/../bootstrap.php';

$title = "All Tests";
$noInclude = true;
require_once __DIR__ . '/partials/header.php';

$directoryRecursiveIterator = new RecursiveDirectoryIterator(__DIR__ . '/');
$iterator = new RecursiveIteratorIterator($directoryRecursiveIterator);
$fileList = [];
/**
 * @var $value SplFileInfo
 */
foreach ($iterator as $key => $value) {
    $hasChapter = preg_match('/Chapter/', $key);
    $isFile = $value->isFile() && !$value->isDir();
    if ($hasChapter && $isFile) {
        $fileList[] = $value->getRealPath();
    }
}

usort($fileList, 'strnatcmp');

foreach ($fileList as $file) {
    $file = new SplFileInfo($file);
    $parentFolder = $file->getPath();
    $pos = strripos($parentFolder, '/');
    $parentName = substr($parentFolder, $pos) . '/' . $file->getBasename();
    $parentPath = '/sandbox/' . $parentName;
    echo "<section class='folderTests panel panel-default'>
          <div class='panel-heading'>
            <h2 class='panel-title'>Unit Test for Chapter: <a href='$parentPath'>$parentName</a></h2>
           </div>
           <div class='panel-body'>
          ";
    require_once $file->getRealPath();
    echo "</div></section>";
}
require_once __DIR__ . '/partials/footer.php';

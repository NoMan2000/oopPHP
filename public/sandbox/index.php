<?php

require_once __DIR__ . '/../bootstrap.php';

$title = "All Tests";
$noInclude = true;
require_once __DIR__ . '/partials/header.php';

$directoryRecursiveIterator = new RecursiveDirectoryIterator(__DIR__ . '/');
$iterator = new RecursiveIteratorIterator($directoryRecursiveIterator);
/**
 * Class
 */
class Sorter extends SplHeap
{
    /**
     *  constructor.
     * @param Iterator $iterator
     */
    public function __construct(Iterator $iterator)
    {
        foreach ($iterator as $item) {
            $this->insert($item);
        }
    }

    /**
     * @param mixed $b
     * @param mixed $a
     * @return int
     */
    public function compare($b, $a)
    {
        return strcmp($a->getRealpath(), $b->getRealpath());
    }
};

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
    require_once $file;
}
require_once __DIR__ . '/partials/footer.php';

<?php

namespace Oopphp\ChapterEleven;


/**
 * Class VoidAndNullable
 * @package Oopphp\ChapterEleven
 */
class VoidAndNullable
{
    /**
     * @param null|string $value
     * @return null|string
     */
    public function getStringOrNullReturn(?string $value) : ?string
    {
        if ($value) {
            return strval($value);
        }
        return null;
    }

    /**
     * @param $action
     * @return void
     */
    public function performAction($action) : void
    {
        // perform some action.
    }
}

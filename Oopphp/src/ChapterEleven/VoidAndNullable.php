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

    /**
     * Void can return nothing as a control flow statement, but null cannot be given.
     * @return void
     */
    public function goodVoid() : void
    {
        return;
    }

    /**
     * This will always throw an error immediately
     */
//    public function badVoid() : void
//    {
//        return null;
//    }
}

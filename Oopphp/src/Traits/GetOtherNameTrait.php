<?php

namespace Oopphp\Traits;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class GetOtherNameTrait
 * @package Oopphp\Traits
 */
trait GetOtherNameTrait
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return "Sam";
    }

    /**
     * @return string
     */
    protected function changeScope() : string
    {
        return 'string';
    }
}

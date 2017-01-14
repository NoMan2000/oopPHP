<?php

namespace Oopphp\ChapterEight;

use Oopphp\Traits\GetNameTrait;
use Oopphp\Traits\GetOtherNameTrait;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class GetTwoNamedTraits
 * @package Oopphp\ChapterEight
 */
class GetTwoNamedTraits
{
    use GetNameTrait, GetOtherNameTrait {
        GetNameTrait::getName insteadof GetOtherNameTrait;
        GetOtherNameTrait::getName as getSam;
        GetOtherNameTrait::changeScope as public;
        GetOtherNameTrait::changeScope as public newScope;
    }
}

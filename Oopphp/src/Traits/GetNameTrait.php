<?php

namespace Oopphp\Traits;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class GetNameTrait
 * @package Oopphp\Traits
 */
trait GetNameTrait
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
}

<?php

namespace Oopphp\Traits;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * Class GetIDTrait
 * @package Oopphp\Traits
 */
trait GetIDTrait
{
    use GetNameTrait;
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     * Using self is important here because we cannot return the actual Trait
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

}

<?php

namespace Oopphp\ChapterNine;

use Oopphp\Contracts\UserContract;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class AnonGenerator
 * @package Oopphp\ChapterNine
 */
class UserClassGenerator extends AbstractAnonClassFactory
{
    /**
     * An example of keeping the parent generic but implementing more details in the child
     * @return UserContract
     */
    public function getClass() : UserContract
    {
        return parent::getClass();
    }

    /**
     * @return mixed
     */
    protected function createAnonymousClass()
    {
        return new class implements UserContract {
            /**
             * @var string
             */
            protected $username;
            /**
             * @var int
             */
            protected $id;

            /**
             * @param int $id
             * @return $this
             */
            public function setID(int $id)
            {
                $this->id = $id;
                return $this;
            }

            /**
             * @param string $name
             * @return $this
             */
            public function setUsername(string $name)
            {
                $this->username = $name;
                return $this;
            }

            /**
             * @return string
             */
            public function getUsername() : string
            {
                return $this->username;
            }

            /**
             * @return int
             */
            public function getID() : int
            {
                return $this->id;
            }
        };
    }
}

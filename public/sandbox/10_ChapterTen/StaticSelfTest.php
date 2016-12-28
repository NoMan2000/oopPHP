<?php
namespace ChapterTen;

use Codeception\Specify;
use Oopphp\ChaperTen\StaticSelf;
use Oopphp\ChaperTen\StaticSelfChild;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return object
 */

interface GetStaticInterface
{
    /**
     * @return StaticSelf
     */
    public function getStaticClass(): StaticSelf;

    /**
     * @return StaticSelfChild
     */
    public function getStaticChildClass(): StaticSelfChild;
}

/**
 * @return GetStaticInterface
 */
$before = function () {
    return new class implements GetStaticInterface {
        /**
         * @var $staticClass StaticSelf
         */
        protected $staticClass;
        /**
         * @var $staticChildClass StaticSelfChild
         */
        protected $staticChildClass;

        /**
         *  constructor.
         */
        public function __construct()
        {
            $this->staticClass = new StaticSelf();
            $this->staticChildClass = new StaticSelfChild();
        }

        /**
         * @return StaticSelf
         */
        public function getStaticClass(): StaticSelf
        {
            return $this->staticClass;
        }

        /**
         * @return StaticSelfChild
         */
        public function getStaticChildClass(): StaticSelfChild
        {
            return $this->staticChildClass;
        }

    };

};

specify($statement = "A late value binding should be bound to the child class, an early static binding will be bound to the parent",
    function () use($statement, $before) {
        /**
         * @var $class GetStaticInterface
         */
        $class = $before();
        $staticClass = $class->getStaticClass();
        $staticChildClass = $class->getStaticChildClass();

        expectExt($staticClass->getSelf())->equals(StaticSelf::class)->e();
        expectExt($staticClass->getStatic())->equals(StaticSelf::class)->e();

        expectExt($staticChildClass->getSelf())->equals(StaticSelf::class)->e(); // This is the unexpected result
        expectExt($staticChildClass->getStatic())->equals(StaticSelfChild::class)->e();
});



if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}

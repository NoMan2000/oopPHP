<?php
namespace ChapterSeven;

use Codeception\Specify;
use Oopphp\Exceptions\ErrorExceptionHandler;

/**
 * Class ExceptionsTest
 * @package ChapterSeven
 */
class ExceptionsTest extends \Codeception\Test\Unit
{
    use Specify;

    /**
     * @before
     */
    public function _before()
    {
        (new ErrorExceptionHandler());
    }
    /**
     * @test
     * @throws \Exception
     */
    public function testCanTriggerAnErrorAndException()
    {
        $this->specify("Can convert an error into an exception", function () {
            try {
                trigger_error("You did something bad");
            } catch (\Exception $e) {
                verify($e)->isInstanceOf(\Exception::class);
            } catch (\Throwable $t) {

            }
        });

        $this->specify("Can suppress an error", function () {
            $error = false;
            try {
                // trigger_error will always return true unless you set the second argument to an invalid type.
                $error = @trigger_error("This is something really stupid to do");
            } catch (\Throwable $t) {

            }
            verify($error)->equals(true);
        });

    }
}

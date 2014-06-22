<?php namespace Khill\Lavacharts\Tests\Helpers;

use Khill\Lavacharts\Helpers\Helpers;

class HelperBetweenTest extends \PHPUnit_Framework_TestCase
{
    public function testBetweenWithIntsInRange()
    {
        $this->assertTrue( Helpers::between(0, 5, 10) );
    }

    public function testBetweenWithIntsOutOfLowerRange()
    {
        $this->assertFalse( Helpers::between(3, 1, 10) );
    }

    public function testBetweenWithIntsOutOfUpperRange()
    {
        $this->assertFalse( Helpers::between(6, 12, 10) );
    }

    public function testBetweenWithIntsInRangeInclusive()
    {
        $this->assertTrue( Helpers::between(1, 1, 10) );
    }

    public function testBetweenWithIntsInRangeNonInclusive()
    {
        $this->assertFalse( Helpers::between(1, 1, 10, FALSE) );
    }

    public function testBetweenWithFloatsInRange()
    {
        $this->assertTrue( Helpers::between(5.7, 6.4, 10.6) );
    }

    public function testBetweenWithFloatsOutOfLowerRange()
    {
        $this->assertFalse( Helpers::between(8.8, 6.4, 10.6) );
    }

    public function testBetweenWithFloatsOutOfUpperRange()
    {
        $this->assertFalse( Helpers::between(6.4, 12.5, 10.6) );
    }

    public function testBetweenWithFloatsInRangeInclusive()
    {
        $this->assertTrue( Helpers::between(6.4, 6.4, 10.6) );
    }

    public function testBetweenWithFloatsInRangeNonInclusive()
    {
        $this->assertFalse( Helpers::between(6.4, 6.4, 10.6, FALSE) );
    }

    /**
     * @dataProvider badParamsProvider
     */
    public function testBetweenWithBadParams($lower, $test, $upper, $includeLimits = TRUE)
    {
        $this->assertFalse( Helpers::between($lower, $test, $upper, $includeLimits) );
    }


    public function badParamsProvider()
    {
        return array(
            array(1, 2, 3, 'string'),
            array(1, 2, 3, array()),
            array(1, 2, 3, new \stdClass()),
            array(1, 2, 3, 1),
            array(1, 2, 3, 1.1),
            array('1', '2', '3'),
            array(array(), array(), array()),
            array(TRUE, TRUE, TRUE),
            array(FALSE, FALSE, FALSE),
            array(NULL, NULL, NULL),
            array(new \stdClass(), new \stdClass(), new \stdClass())
        );
    }
}

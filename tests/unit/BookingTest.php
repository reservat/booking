<?php

namespace Reservat;

use Reservat\Core\DateTime;

class BookingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Reservat\Booking
     */
    protected $booking = null;

    public function setUp()
    {
        if (!$this->booking instanceof Booking) {
            $this->booking = new \Reservat\Booking(1, 1, 'NEW', [1, 2, 3], 6, new DateTime(), new DateTime());
        }

        return $this->booking;
    }

    public function testGetBooking()
    {
        // Getters
        $this->assertEquals(1, $this->booking->getCustomer());
        $this->assertEquals(1, $this->booking->getVenue());
        $this->assertEquals('NEW', $this->booking->getState());
        $this->assertEquals([1, 2, 3], $this->booking->getTables());
        $this->assertEquals(6, $this->booking->getGuestsCount());
        $this->assertInternalType('string', $this->booking->getId());
    }

    public function testSetBooking()
    {
        $this->booking->setCustomer(2);
        $this->assertEquals(2, $this->booking->getCustomer());

        // Change customer details
        $this->booking->setVenue(2);
        $this->booking->setState('CANCELLED');
        $this->booking->setTables([12]);
        $this->booking->setGuestsCount(8);

        $this->assertEquals(2, $this->booking->getCustomer());
        $this->assertEquals(2, $this->booking->getVenue());
        $this->assertEquals('CANCELLED', $this->booking->getState());
        $this->assertEquals([12], $this->booking->getTables());
        $this->assertEquals(8, $this->booking->getGuestsCount());

    }

    public function testInstanceToArray()
    {
        $array = $this->booking->toArray();

        $this->assertInternalType('array', $array);
        $this->assertCount(8, $array);
    }
}

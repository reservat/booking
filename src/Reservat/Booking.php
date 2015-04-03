<?php

namespace Reservat;

use Reservat\Core\Interfaces\EntityInterface;
use Reservat\Interfaces\BookingInterface;

class Booking implements BookingInterface, EntityInterface
{

    protected $bookingId = null;
    protected $customer = null;
    protected $venue = null;
    protected $state = null;
    protected $tables = null;
    protected $guests = null;
    protected $dateStart = null;
    protected $dateBooked = null;

    public function __construct($customer, $venue, $state, $tables, $guests, $dateStart, $dateBooked, $id = false)
    {
        $this->customer = $customer;
        $this->venue = $venue;
        $this->state = $state;
        $this->tables = $tables;
        $this->guests = $guests;
        $this->dateStart = $dateStart;
        $this->dateBooked = $dateBooked;
        $this->bookingId = $id ? $id : $this->getId();
    }

    public function setId($id)
    {
        $this->bookingId = $id;
    }

    public function getId()
    {
        if (!$this->bookingId) {
            $this->setId(uniqid());
        }
        return $this->bookingId;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getVenue()
    {
        return $this->venue;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getTables()
    {
        return $this->tables;
    }

    public function getGuestsCount()
    {
        return $this->guests;
    }

    public function getDateStart()
    {
        return $this->dateStart;
    }

    public function getDateBooked()
    {
        return $this->dateBooked;
    }

    public function toArray()
    {
        return [
            'bookingId' => $this->bookingId,
            'customer' => $this->customer,
            'venue' => $this->venue,
            'state' => $this->state,
            'tables' => $this->tables,
            'guests' => $this->guests,
            'dateStart' => $this->dateStart->apiFormat(),
            'dateBooked' => $this->dateBooked->apiFormat()
        ];
    }
}

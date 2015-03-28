<?

namespace Reservat;

use Reservat\Core\Interfaces\EntityInterface;
use Reservat\Interfaces\BookingInterface;

class Booking implements BookingInterface, EntityInterface
{

	protected $_bookingId = null;
	protected $_customer = null;
	protected $_venue = null;
	protected $_state = null;
	protected $_tables = null;
	protected $_guests = null;
	protected $_dateStart = null;
	protected $_dateBooked = null;

	public function __construct($customer, $venue, $state, $tables, $guests, $dateStart, $dateBooked, $id = false)
	{
		$this->_customer = $customer;
		$this->_venue = $venue;
		$this->_state = $state;
		$this->_tables = $tables;
		$this->_guests = $guests;
		$this->_dateStart = $dateStart;
		$this->_dateBooked = $dateBooked;
		$this->_bookingId = $id ? $id : $this->getId();
	}

	public function setId($id)
	{
		$this->_bookingId = $id;
	}

	public function getId()
	{
		if(!$this->_bookingId){
			$this->setId(uniqid());
		}
		return $this->_bookingId;
	}

	public function getCustomer()
	{
		return $this->_customer;
	}

	public function getVenue()
	{
		return $this->_venue;
	}

	public function getState()
	{
		return $this->_state;
	}

	public function getTables()
	{
		return $this->_tables;
	}

	public function getGuestsCount()
	{
		return $this->_guests;
	}

	public function getDateStart()
	{
		return $this->_dateStart;
	}

	public function getDateBooked()
	{
		return $this->_dateBooked;
	}

	public function toArray()
	{
		return [
			'bookingId' => $this->_bookingId,
			'customer' => $this->_customer,
			'venue' => $this->_venue,
			'state' => $this->_state,
			'tables' => $this->_tables,
			'guests' => $this->_guests,
			'dateStart' => $this->_dateStart->apiFormat(),
			'dateBooked' => $this->_dateBooked->apiFormat()
		];
	}
}
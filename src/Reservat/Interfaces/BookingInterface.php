<?

namespace Reservat\Interfaces;

interface BookingInterface
{
	public function getId();
	public function getCustomer();
	public function getVenue();
	public function getState();
	public function getTables();
	public function getGuestsCount();
	public function getDateStart();
	public function getDateBooked();
}
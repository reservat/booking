<?

namespace Reservat\Datamapper;

use Reservat\Core\Interfaces\DataMapperInterface;
use Reservat\Core\Interfaces\EntityInterface;

class ESBookingDatamapper extends ESDataMapper implements DataMapperInterface
{

    protected static $_index = 'bookings';
    
    protected static $_type = 'booking';

    protected static $_id = 'bookingId';

	protected $_mapping = [
		'_source' => [
                'enabled' => true
        ],
        'properties' => [
            'bookingId' => [
                'type' => 'string'
            ],
            'customerId' => [
                'type' => 'integer'
            ],
            'venueId' => [
            	'type' => 'integer'
            ],
            'state' => [
                'type' => 'string'
            ],
            'tableIds' => [
                "type"  => "integer", 
                "index_name" => "tableId"
            ],
            'guests' => [
                'type' => 'integer'
            ],
            'dateStart' => [
            	'type' => 'date'
            ],
            'dateBooked' => [
            	'type' => 'date'
            ]
        ]
	];

}
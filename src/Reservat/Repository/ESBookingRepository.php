<?

namespace Reservat\Repository;

use Reservat\Core\Interfaces\RepositoryInterface;
use Reservat\Datamapper\ESBookingDatamapper;
use Elasticsearch\Client;

class ESBookingRepository implements RepositoryInterface
{
	protected $client = null;

	public function __construct(Client $client){
		$this->client = $client;
	}

	public function getById($id)
	{

	}

	public function getAll()
	{
		$query = [
		    "query" => [
		        "match_all" => []
		    ]
		];

		$params['index'] = ESBookingMapper::getIndex();
		$params['type']  = ESBookingMapper::getType();
		$params['body']  = json_encode($query);

		$results = $this->client->search($params);

		return $results;
	}
}
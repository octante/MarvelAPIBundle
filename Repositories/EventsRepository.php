<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Query\EventQuery;

class EventsRepository
{
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param EventQuery $query
     *
     * @return EventsCollection
     */
    public function getEvents(EventQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $eventId
     */
    public function getEventById($eventId)
    {
        // TO IMPLEMENT
    }
} 
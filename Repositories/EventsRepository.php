<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\EventQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\EventId;

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
     * @param EventId $eventId
     *
     * @return EventsCollection
     */
    public function getEventById(EventId $eventId)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId());

        $data = $this->client
            ->send($baseUrl->getURL());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param EventId $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getCharactersFromEvent(EventId $eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId(), 'characters');

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param EventId $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getComicsFromEvent(EventId $eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId(), 'comics');

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param EventId $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getCreatorsFromCreator(EventId $eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId(), 'creators');

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param EventId $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getSeriesFromCreator(EventId $eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId(), 'series');

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param EventId $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getStoriesFromCreator(EventId $eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create('events', $eventId->getEventId(), 'stories');

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    private function getEventsCollection($baseUrl, $eventQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $eventQuery->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }
} 
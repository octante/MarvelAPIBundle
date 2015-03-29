<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Repositories;


use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\EventQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\EventId;

class EventsRepository
{
    /**
     * @var \Octante\MarvelAPIBundle\Lib\Client
     */
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
        $baseUrl = BaseURL::create('events');

        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $query->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $eventId
     *
     * @return EventsCollection
     */
    public function getEventById($eventId)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId()
        );

        $data = $this->client
            ->send($baseUrl->getURL());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getCharactersFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'characters'
        );

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param int $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getComicsFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'comics'
        );

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param int $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getCreatorsFromCreator($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'creators'
        );

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param int $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getSeriesFromCreator($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'series'
        );

        return $this->getEventsCollection($baseUrl, $eventQuery);
    }

    /**
     * @param int $eventId
     * @param EventQuery $eventQuery
     *
     * @return EventsCollection
     */
    public function getStoriesFromCreator($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'stories'
        );

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
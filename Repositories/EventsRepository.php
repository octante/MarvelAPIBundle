<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Model\Collections\SeriesCollection;
use Octante\MarvelAPIBundle\Model\Collections\StoriesCollection;
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
            ->send($baseUrl->getURL() . $query->getQuery());

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
     * @param int        $eventId
     * @param EventQuery $eventQuery
     *
     * @return CharactersCollection
     */
    public function getCharactersFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'characters'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $eventQuery->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int        $eventId
     * @param EventQuery $eventQuery
     *
     * @return ComicsCollection
     */
    public function getComicsFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'comics'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $eventQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int        $eventId
     * @param EventQuery $eventQuery
     *
     * @return CreatorsCollection
     */
    public function getCreatorsFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'creators'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $eventQuery->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int        $eventId
     * @param EventQuery $eventQuery
     *
     * @return SeriesCollection
     */
    public function getSeriesFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'series'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $eventQuery->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int        $eventId
     * @param EventQuery $eventQuery
     *
     * @return StoriesCollection
     */
    public function getStoriesFromEvent($eventId, EventQuery $eventQuery)
    {
        $baseUrl = BaseURL::create(
            'events',
            EventId::create($eventId)->getEventId(),
            'stories'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $eventQuery->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }
}

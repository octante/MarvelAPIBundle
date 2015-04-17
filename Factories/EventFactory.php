<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Model\Entities\Event;
use Octante\MarvelAPIBundle\Model\Summaries\EventSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\EventId;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

/**
 * Class EventFactory
 */
class EventFactory extends AbstractFactory
{
    /**
     * @param $eventData
     *
     * @return Event
     */
    public function createEvent($eventData)
    {
        $event = Event::create(EventId::create($eventData['id']));

        if (isset($eventData['title'])) {
            $event->setTitle($eventData['title']);
        }
        if (isset($eventData['description'])) {
            $event->setDescription($eventData['description']);
        }
        if (isset($eventData['modified'])) {
            $event->setModified($eventData['modified']);
        }
        if (isset($eventData['resourceURI'])) {
            $event->setResourceURI(URI::create($eventData['resourceURI']));
        }
        if (isset($eventData['urls'])) {
            $event->setUrls($eventData['urls']);
        }
        if (isset($eventData['start'])) {
            $event->setStart($eventData['start']);
        }
        if (isset($eventData['end'])) {
            $event->setEnd($eventData['end']);
        }
        if (!empty($eventData['thumbnail'])) {
            $event->setThumbnail($this->createThumbnail($eventData));
        }
        if (!empty($eventData['stories'])) {
            $event->setStories($this->createStoriesList($eventData));
        }
        if (!empty($eventData['events'])) {
            $event->setEvents($this->createEventsList($eventData));
        }
        if (!empty($eventData['creators'])) {
            $event->setCreators($this->createCreatorsList($eventData));
        }
        if (!empty($eventData['characters'])) {
            $event->setCharacters($this->createCharactersList($eventData));
        }
        if (!empty($eventData['series'])) {
            $event->setSeries($this->createSeriesList($eventData));
        }
        if (!empty($eventData['comics'])) {
            $event->setComics($this->createComicsList($eventData));
        }
        if (isset($eventData['next'])) {
            $eventSummary = EventSummary::create(
                $eventData['next']['resourceURI'],
                $eventData['next']['name']
            );
            $event->setNext($eventSummary);
        }
        if (isset($eventData['previous'])) {
            $eventSummary = EventSummary::create(
                $eventData['previous']['resourceURI'],
                $eventData['previous']['name']
            );
            $event->setPrevious($eventSummary);
        }

        return $event;
    }
}

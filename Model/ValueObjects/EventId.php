<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidEventIdException;

class EventId
{
    /**
     * @var
     */
    private $eventId;

    /**
     * @param $eventId
     */
    private function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @param $eventId
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\InvalidEventIdException
     *
     * @return \Octante\MarvelAPIBundle\ValueObjects\CharacterId
     */
    public static function create($eventId)
    {
        if (!is_numeric($eventId)) {
            throw new InvalidEventIdException("Event Id is not numeric \"$eventId\"");
        }

        return new EventId($eventId);
    }

    /**
     * @return mixed
     */
    public function getCharacterId()
    {
        return $this->eventId;
    }
} 
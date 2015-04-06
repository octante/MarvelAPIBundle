<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidEventIdException;

class EventId
{
    /**
     * @var int
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
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\EventId
     */
    public static function create($eventId)
    {
        if (!is_numeric($eventId)) {
            throw new InvalidEventIdException("Event Id is not numeric \"$eventId\"");
        }

        return new EventId($eventId);
    }

    /**
     * @return int
     */
    public function getEventId()
    {
        return $this->eventId;
    }
} 
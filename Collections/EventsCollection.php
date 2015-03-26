<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Collections;


use Octante\MarvelAPIBundle\DataContainer\CreatorDataContainer;
use Octante\MarvelAPIBundle\DataContainer\EventDataContainer;
use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

class EventsCollection
{
    /**
     * @var DataWrapper
     */
    private $eventsDataWrapper;

    /**
     * @param DataWrapper $eventsDataWrapper
     */
    private function __construct(DataWrapper $eventsDataWrapper)
    {
        $this->eventsDataWrapper = $eventsDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return EventsCollection
     */
    public static function create($data)
    {
        return new EventsCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return DataWrapper
     */
    public function getEventsDataWrapper()
    {
        return $this->eventsDataWrapper;
    }

    /**
     * @param $data
     *
     * @return DataWrapper
     */
    protected static function parseDataWrapper($data)
    {
        return DataWrapper::create(
            $data['code'],
            $data['status'],
            $data['copyright'],
            $data['attributionText'],
            $data['attributionHTML'],
            EventDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
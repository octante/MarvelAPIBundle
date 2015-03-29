<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\EventDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

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
     * @return EventDataContainer
     */
    public function getData()
    {
        return $this->eventsDataWrapper->getData();
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
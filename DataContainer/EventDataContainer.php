<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\DataContainer;


use Octante\MarvelAPIBundle\Factories\EventFactory;

class EventDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $events = array();
        // @todo createEvent must be static method from EventFactory
        $eventFactory = new EventFactory();
        foreach ($results as $result) {
            $events[] = $eventFactory->createEvent($result);
        }
        return $events;
    }
} 
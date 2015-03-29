<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\DataContainer;


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
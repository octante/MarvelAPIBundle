<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 11:48
 */

namespace Octante\MarvelAPIBundle\Collections;


use Octante\MarvelAPIBundle\DataContainer\DataContainer;
use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

abstract class AbstractCollection
{
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
            DataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
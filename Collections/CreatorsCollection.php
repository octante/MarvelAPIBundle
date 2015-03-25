<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Collections;


use Octante\MarvelAPIBundle\DataContainer\CreatorDataContainer;
use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

class CreatorsCollection
{
    /**
     * @var DataWrapper
     */
    private $creatorsDataWrapper;

    /**
     * @param DataWrapper $creatorsDataWrapper
     */
    private function __construct(DataWrapper $creatorsDataWrapper)
    {
        $this->creatorsDataWrapper = $creatorsDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return CreatorsCollection
     */
    public static function create($data)
    {
        return new CreatorsCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return DataWrapper
     */
    public function getCreatorsDataWrapper()
    {
        return $this->creatorsDataWrapper;
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
            CreatorDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
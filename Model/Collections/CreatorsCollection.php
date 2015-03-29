<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\CreatorDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

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
     * @return CreatorDataContainer
     */
    public function getData()
    {
        return $this->creatorsDataWrapper->getData();
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
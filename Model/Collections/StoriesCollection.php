<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\StoryDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

class StoriesCollection
{
    /**
     * @var DataWrapper
     */
    private $storyDataWrapper;

    /**
     * @param DataWrapper $storyDataWrapper
     */
    private function __construct(DataWrapper $storyDataWrapper)
    {
        $this->storyDataWrapper = $storyDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return StoriesCollection
     */
    public static function create($data)
    {
        return new StoriesCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return StoryDataContainer
     */
    public function getData()
    {
        return $this->storyDataWrapper->getData();
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
            StoryDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidStoryIdException;

class StoryId
{
    /**
     * @var
     */
    private $storyId;

    /**
     * @param $storyId
     */
    private function __construct($storyId)
    {
        $this->storyId = $storyId;
    }

    /**
     * @param $storyId
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\InvalidStoryIdException
     *
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\StoryId
     */
    public static function create($storyId)
    {
        if (!is_numeric($storyId)) {
            throw new InvalidStoryIdException("Story Id is not numeric \"$storyId\"");
        }

        return new StoryId($storyId);
    }

    /**
     * @return mixed
     */
    public function getStoryId()
    {
        return $this->storyId;
    }
} 
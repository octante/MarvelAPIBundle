<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\Model\DataContainer;


use Octante\MarvelAPIBundle\Factories\SerieFactory;

class StoryDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $stories = array();
        // @todo createStory must be static method from StoryFactory
        $storyFactory = new SerieFactory();
        foreach ($results as $result) {
            $stories[] = $storyFactory->createSerie($result);
        }
        return $stories;
    }
} 
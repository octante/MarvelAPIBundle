<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
        $stories = [];
        // @todo createStory must be static method from StoryFactory
        $storyFactory = new SerieFactory();
        foreach ($results as $result) {
            $stories[] = $storyFactory->createSerie($result);
        }

        return $stories;
    }
}

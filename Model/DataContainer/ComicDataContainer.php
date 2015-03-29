<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\Model\DataContainer;


use Octante\MarvelAPIBundle\Factories\ComicFactory;

class ComicDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $comics = array();
        // @todo createComic must be static method from ComicFactory
        $comicFactory = new ComicFactory();
        if (is_array($results)) {
            foreach ($results as $result) {
                $comics[] = $comicFactory->createComic($result);
            }
        }
        return $comics;
    }
} 
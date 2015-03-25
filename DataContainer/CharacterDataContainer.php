<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\DataContainer;


use Octante\MarvelAPIBundle\Factories\CharacterFactory;

class CharacterDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $comics = array();
        // @todo createCharacter must be static method from CharacterFactory
        $characterFactory = new CharacterFactory();
        foreach ($results as $result) {
            $comics[] = $characterFactory->createCharacter($result);
        }
        return $comics;
    }
} 
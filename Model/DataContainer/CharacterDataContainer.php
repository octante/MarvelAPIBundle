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
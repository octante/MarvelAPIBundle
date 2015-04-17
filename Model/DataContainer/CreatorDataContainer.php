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

use Octante\MarvelAPIBundle\Factories\CreatorFactory;

class CreatorDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $creators = [];
        // @todo createCreator must be static method from CreatorFactory
        $creatorFactory = new CreatorFactory();
        foreach ($results as $result) {
            $creators[] = $creatorFactory->createCreator($result);
        }

        return $creators;
    }
}

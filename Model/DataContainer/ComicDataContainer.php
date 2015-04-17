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
        $comics = [];
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

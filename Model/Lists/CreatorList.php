<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Lists;

use Octante\MarvelAPIBundle\Model\Summaries\CreatorSummary;

class CreatorList
{
    /**
     * @var int
     */
    private $available;

    /**
     * @var int
     */
    private $returned;

    /**
     * @var string
     */
    private $collectionURI;

    /**
     * Array of StorySummary
     *
     * @var array
     */
    private $items;

    /**
     * @param $available
     * @param $returned
     * @param $collectionURI
     * @param $items
     */
    private function __construct(
        $available,
        $returned,
        $collectionURI,
        $items
    ) {
        $this->available = $available;
        $this->returned = $returned;
        $this->collectionURI = $collectionURI;
        $this->items = $items;
    }

    /**
     * @param $available
     * @param $returned
     * @param $collectionURI
     * @param $items
     *
     * @return CreatorList
     */
    public static function create(
        $available,
        $returned,
        $collectionURI,
        $items
    ) {
        return new CreatorList(
            $available,
            $returned,
            $collectionURI,
            self::getCreatorSummaries($items)
        );
    }

    /**
     * @param $items
     *
     * @return array
     */
    private static function getCreatorSummaries($items)
    {
        $creatorSummaries = [];
        foreach ($items as $item) {
            $creatorSummaries[] = CreatorSummary::create(
                $item['resourceURI'],
                $item['name'],
                $item['role']
            );
        }

        return $creatorSummaries;
    }

    /**
     * @return int
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @return string
     */
    public function getCollectionURI()
    {
        return $this->collectionURI;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getReturned()
    {
        return $this->returned;
    }
}

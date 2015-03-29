<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Lists;


use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;

class SerieList
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
     * Array of SerieSummary
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
    ){
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
     * @return StoryList
     */
    public static function create(
        $available,
        $returned,
        $collectionURI,
        $items
    ){
        return new SerieList(
            $available,
            $returned,
            $collectionURI,
            self::getSeriesSummaries($items)
        );
    }

    /**
     * @param $items
     *
     * @return array
     */
    private static function getSeriesSummaries($items)
    {
        $seriesSummaries = array();
        foreach ($items as $item) {
            $seriesSummaries[] = SerieSummary::create(
                $item['resourceURI'],
                $item['name']
            );
        }

        return $seriesSummaries;
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
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 12:28
 */

namespace Octante\MarvelAPIBundle\Lists;


use Octante\MarvelAPIBundle\Summaries\ComicSummary;

class ComicList
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
     * @return ComicList
     */
    public static function create(
        $available,
        $returned,
        $collectionURI,
        $items
    ){
        return new ComicList(
            $available,
            $returned,
            $collectionURI,
            self::getComicSummaries($items)
        );
    }

    /**
     * @param $items
     *
     * @return array
     */
    private static function getComicSummaries($items)
    {
        $comicSummaries = array();
        foreach ($items as $item) {
            $comicSummaries[] = ComicSummary::create(
                $item['resourceURI'],
                $item['name']
            );
        }
        return $comicSummaries;
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
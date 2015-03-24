<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\ValueObjects;


use Octante\MarvelAPIBundle\Factories\ComicFactory;

class DataContainer
{
    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $count;

    /**
     * @var array
     */
    private $results;

    /**
     * @param $offset
     * @param $limit
     * @param $total
     * @param $count
     * @param $results
     */
    private function __construct(
        $offset,
        $limit,
        $total,
        $count,
        $results
    ){
        $this->offset = $offset;
        $this->limit = $limit;
        $this->total = $total;
        $this->count = $count;
        $this->results = $results;
    }

    /**
     * @param $offset
     * @param $limit
     * @param $total
     * @param $count
     * @param $results
     *
     * @throws \InvalidArgumentException
     *
     * @return DataContainer
     */
    public static function create(
        $offset,
        $limit,
        $total,
        $count,
        $results
    ){
        if (!is_numeric($offset)) {
            throw new \InvalidArgumentException("Invalid offset \"$offset\"");
        }
        if (!is_numeric($limit)) {
            throw new \InvalidArgumentException("Invalid limit \"$limit\"");
        }
        if (!is_numeric($total)) {
            throw new \InvalidArgumentException("Invalid total \"$total\"");
        }
        if (!is_numeric($count)) {
            throw new \InvalidArgumentException("Invalid count \"$count\"");
        }

        return new DataContainer(
            $offset,
            $limit,
            $total,
            $count,
            self::getComics($results));
    }

    /**
     * @param $results
     * @return array
     */
    private static function getComics($results)
    {
        $comics = array();
        foreach ($results as $result) {
            $comics[] = (new ComicFactory)->createComic($result);
        }
        return $comics;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }
} 
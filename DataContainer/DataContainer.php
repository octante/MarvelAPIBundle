<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\DataContainer;


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
            static::getItems($results));
    }

    /**
     * Override this method in children classes. This is a template method
     *
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        return array();
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
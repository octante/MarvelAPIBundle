<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidSerieIdException;

class SerieId
{
    /**
     * @var
     */
    private $serieId;

    /**
     * @param $serieId
     */
    private function __construct($serieId)
    {
        $this->serieId = $serieId;
    }

    /**
     * @param $serieId
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\InvalidSerieIdException
     *
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\SerieId
     */
    public static function create($serieId)
    {
        if (!is_numeric($serieId)) {
            throw new InvalidSerieIdException("Serie Id is not numeric \"$serieId\"");
        }

        return new SerieId($serieId);
    }

    /**
     * @return SerieId
     */
    public function getSerieId()
    {
        return $this->serieId;
    }
} 
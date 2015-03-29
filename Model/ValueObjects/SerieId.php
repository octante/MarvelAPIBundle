<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
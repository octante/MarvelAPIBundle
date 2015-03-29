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


use Octante\MarvelAPIBundle\Exceptions\InvalidComicIdException;

class ComicId
{
    /**
     * @var
     */
    private $comicId;

    /**
     * @param $comicId
     */
    private function __construct($comicId)
    {
        $this->comicId = $comicId;
    }

    /**
     * @param $comicId
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\InvalidComicIdException
     *
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\ComicId
     */
    public static function create($comicId)
    {
        if (!is_numeric($comicId)) {
            throw new InvalidComicIdException("Comic Id is not numeric \"$comicId\"");
        }

        return new ComicId($comicId);
    }

    /**
     * @return mixed
     */
    public function getComicId()
    {
        return $this->comicId;
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
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
     * @return \Octante\MarvelAPIBundle\ValueObjects\ComicId
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
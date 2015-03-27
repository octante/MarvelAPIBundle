<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidCreatorIdException;

class CreatorId
{
    /**
     * @var
     */
    private $creatorId;

    /**
     * @param $creatorId
     */
    private function __construct($creatorId)
    {
        $this->comicId = $creatorId;
    }

    /**
     * @param $creatorId
     *
     * @throws InvalidCreatorIdException
     *
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\CreatorId
     */
    public static function create($creatorId)
    {
        if (!is_numeric($creatorId)) {
            throw new InvalidCreatorIdException("Creator Id is not numeric \"$creatorId\"");
        }

        return new CreatorId($creatorId);
    }

    /**
     * @return mixed
     */
    public function getComicId()
    {
        return $this->creatorId;
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:34
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


use Octante\MarvelAPIBundle\Exceptions\InvalidCharacterIdException;

class CharacterId
{
    /**
     * @var
     */
    private $characterId;

    /**
     * @param $characterId
     */
    private function __construct($characterId)
    {
        $this->characterId = $characterId;
    }

    /**
     * @param $characterId
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\InvalidCharacterIdException
     *
     * @return \Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId
     */
    public static function create($characterId)
    {
        if (!is_numeric($characterId)) {
            throw new InvalidCharacterIdException("Comic Id is not numeric \"$characterId\"");
        }

        return new CharacterId($characterId);
    }

    /**
     * @return mixed
     */
    public function getCharacterId()
    {
        return $this->characterId;
    }
} 
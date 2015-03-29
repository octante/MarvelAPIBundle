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
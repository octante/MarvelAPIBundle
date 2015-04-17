<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;

use Octante\MarvelAPIBundle\Exceptions\InvalidCreatorIdException;

class CreatorId
{
    /**
     * @var int
     */
    private $creatorId;

    /**
     * @param $creatorId
     */
    private function __construct($creatorId)
    {
        $this->creatorId = $creatorId;
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
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }
}

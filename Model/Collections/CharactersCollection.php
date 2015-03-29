<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\CharacterDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

class CharactersCollection
{
    /**
     * @var DataWrapper
     */
    private $characterDataWrapper;

    /**
     * @param DataWrapper $characterDataWrapper
     */
    private function __construct(DataWrapper $characterDataWrapper)
    {
        $this->characterDataWrapper = $characterDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return CharactersCollection
     */
    public static function create($data)
    {
        return new CharactersCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return CharacterDataContainer
     */
    public function getData()
    {
        return $this->characterDataWrapper->getData();
    }

    /**
     * @return DataWrapper
     */
    public function getCharactersDataWrapper()
    {
        return $this->characterDataWrapper;
    }

    /**
     * @param $data
     *
     * @return DataWrapper
     */
    protected static function parseDataWrapper($data)
    {
        return DataWrapper::create(
            $data['code'],
            $data['status'],
            $data['copyright'],
            $data['attributionText'],
            $data['attributionHTML'],
            CharacterDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
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
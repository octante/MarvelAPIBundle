<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Collections;


use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

class CharactersCollection extends AbstractCollection
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
} 
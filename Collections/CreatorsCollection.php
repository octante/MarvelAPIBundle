<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Collections;


use Octante\MarvelAPIBundle\ValueObjects\DataContainer;
use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

class CreatorsCollection extends AbstractCollection
{
    /**
     * @var DataWrapper
     */
    private $creatorsDataWrapper;

    /**
     * @param DataWrapper $creatorsDataWrapper
     */
    private function __construct(DataWrapper $creatorsDataWrapper)
    {
        $this->creatorsDataWrapper = $creatorsDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return CreatorsCollection
     */
    public static function create($data)
    {
        return new CreatorsCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return DataWrapper
     */
    public function getCreatorsDataWrapper()
    {
        return $this->creatorsDataWrapper;
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\Model\DataContainer;


use Octante\MarvelAPIBundle\Factories\CreatorFactory;

class CreatorDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $creators = array();
        // @todo createCreator must be static method from CreatorFactory
        $creatorFactory = new CreatorFactory();
        foreach ($results as $result) {
            $creators[] = $creatorFactory->createCreator($result);
        }
        return $creators;
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\Model\DataContainer;


use Octante\MarvelAPIBundle\Factories\SerieFactory;

class SerieDataContainer extends DataContainer
{
    /**
     * @param $results
     *
     * @return array
     */
    protected static function getItems($results)
    {
        $series = array();
        // @todo createSerie must be static method from SerieFactory
        $serieFactory = new SerieFactory();
        foreach ($results as $result) {
            $series[] = $serieFactory->createSerie($result);
        }
        return $series;
    }
} 
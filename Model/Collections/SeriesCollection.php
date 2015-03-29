<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\SerieDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

class SeriesCollection
{
    /**
     * @var DataWrapper
     */
    private $seriesDataWrapper;

    /**
     * @param DataWrapper $seriesDataWrapper
     */
    private function __construct(DataWrapper $seriesDataWrapper)
    {
        $this->seriesDataWrapper = $seriesDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return SeriesCollection
     */
    public static function create($data)
    {
        return new SeriesCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return SerieDataContainer
     */
    public function getData()
    {
        return $this->seriesDataWrapper->getData();
    }

    /**
     * @return DataWrapper
     */
    public function getSeriesDataWrapper()
    {
        return $this->seriesDataWrapper;
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
            SerieDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
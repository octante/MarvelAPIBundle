<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:05
 */

namespace Octante\MarvelAPIBundle\Model\Collections;


use Octante\MarvelAPIBundle\Model\DataContainer\ComicDataContainer;
use Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper;

class ComicsCollection
{
    /**
     * @var DataWrapper
     */
    private $comicDataWrapper;

    /**
     * @param DataWrapper $comicsDataWrapper
     */
    private function __construct(DataWrapper $comicsDataWrapper)
    {
        $this->comicDataWrapper = $comicsDataWrapper;
    }

    /**
     * @param array $data
     *
     * @return ComicsCollection
     */
    public static function create($data)
    {
        return new ComicsCollection(
            self::parseDataWrapper($data)
        );
    }

    /**
     * @return DataWrapper
     */
    public function getComicsDataWrapper()
    {
        return $this->comicDataWrapper;
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
            ComicDataContainer::create(
                $data['data']['offset'],
                $data['data']['limit'],
                $data['data']['total'],
                $data['data']['count'],
                $data['data']['results']
            ),
            $data['etag']);
    }
} 
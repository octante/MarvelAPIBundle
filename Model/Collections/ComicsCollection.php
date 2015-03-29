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
        return (new ComicsCollection(
                    self::parseDataWrapper($data)
                )
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
     * @return ComicDataContainer
     */
    public function getData()
    {
        return $this->comicDataWrapper->getData();
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
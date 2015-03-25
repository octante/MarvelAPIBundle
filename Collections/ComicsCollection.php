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

class ComicsCollection extends AbstractCollection
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
} 
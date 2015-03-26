<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 12:29
 */

namespace Octante\MarvelAPIBundle\Model\Summaries;


class ComicSummary
{
    /**
     * @var string
     */
    private $resourceURI;

    /**
     * @var string
     */
    private $name;

    /**
     * @param $resourceURI
     * @param $name
     */
    private function __construct($resourceURI, $name)
    {
        $this->resourceURI = $resourceURI;
        $this->name = $name;
    }

    /**
     * @param $resourceURI
     * @param $name
     *
     * @return SerieSummary
     */
    public static function create($resourceURI, $name)
    {
        return new ComicSummary($resourceURI, $name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getResourceURI()
    {
        return $this->resourceURI;
    }
} 
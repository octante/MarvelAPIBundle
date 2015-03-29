<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Summaries;


class StorySummary
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
     * @var string
     */
    private $type;

    /**
     * @param $resourceURI
     * @param $name
     * @param $type
     */
    private function __construct($resourceURI, $name, $type)
    {
        $this->resourceURI = $resourceURI;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @param $resourceURI
     * @param $name
     * @param $type
     *
     * @return StorySummary
     */
    public static function create($resourceURI, $name, $type)
    {
        return new StorySummary($resourceURI, $name, $type);
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
} 
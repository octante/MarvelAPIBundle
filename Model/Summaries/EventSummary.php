<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Summaries;

class EventSummary
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
     * @return EventSummary
     */
    public static function create($resourceURI, $name)
    {
        return new EventSummary($resourceURI, $name);
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

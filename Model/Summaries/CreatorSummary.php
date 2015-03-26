<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 12:29
 */

namespace Octante\MarvelAPIBundle\Model\Summaries;


class CreatorSummary
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
    private $role;

    /**
     * @param $resourceURI
     * @param $name
     * @param $role
     */
    private function __construct($resourceURI, $name, $role)
    {
        $this->resourceURI = $resourceURI;
        $this->name = $name;
        $this->role = $role;
    }

    /**
     * @param $resourceURI
     * @param $name
     * @param $role
     *
     * @return CharacterSummary
     */
    public static function create($resourceURI, $name, $role)
    {
        return new CreatorSummary($resourceURI, $name, $role);
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
    public function getRole()
    {
        return $this->role;
    }
} 
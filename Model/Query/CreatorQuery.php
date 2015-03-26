<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:19
 */

namespace Octante\MarvelAPIBundle\Model\Query;

class CreatorQuery extends Query
{
    const ORDER_BY_LAST_NAME        = 'lastName';
    const ORDER_BY_FIRST_NAME       = 'firstName';
    const ORDER_BY_MIDDLE_NAME      = 'middleName';
    const ORDER_BY_SUFFIX           = 'suffix';
    const ORDER_BY_MODIFIED         = 'modified';
    const ORDER_BY_MINUS_FIRST_NAME = '-fistName';
    const ORDER_BY_MINUS_SUFFIX     = '-suffix';
    const ORDER_BY_MINUS_MODIFIED   = '-modified';

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->filters['firstName'] = $firstName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->filters['middleName'] = $middleName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->filters['lastName'] = $lastName;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->filters['suffix'] = $suffix;
    }

    /**
     * @param string $nameStartsWith
     */
    public function setNameStartsWith($nameStartsWith)
    {
        $this->filters['nameStartsWith'] = $nameStartsWith;
    }

    /**
     * @param string $firstNameStartsWith
     */
    public function setFirstNameStartsWith($firstNameStartsWith)
    {
        $this->filters['firstNameStartsWith'] = $firstNameStartsWith;
    }

    /**
     * @param string $middleNameStartsWith
     */
    public function setMiddleNameStartsWith($middleNameStartsWith)
    {
        $this->filters['middleNameStartsWith'] = $middleNameStartsWith;
    }

    /**
     * @param string $lastNameStartsWith
     */
    public function setLastNameStartsWith($lastNameStartsWith)
    {
        $this->filters['lastNameStartsWith'] = $lastNameStartsWith;
    }

    /**
     * @param string $modifiedSince
     */
    public function setModifiedSince($modifiedSince)
    {
        $this->filters['modifiedSince'] = $modifiedSince;
    }

    /**
     * @param string $comics
     */
    public function setComics($comics)
    {
        $this->filters['comics'] = $comics;
    }

    /**
     * @param string $series
     */
    public function setSeries($series)
    {
        $this->filters['series'] = $series;
    }

    /**
     * @param string $events
     */
    public function setEvents($events)
    {
        $this->filters['events'] = $events;
    }

    /**
     * @param string $stories
     */
    public function setStories($stories)
    {
        $this->filters['stories'] = $stories;
    }
}
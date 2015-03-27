<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 25/3/15
 * Time: 23:36
 */

namespace Octante\MarvelAPIBundle\Factories;


use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\SerieList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;

class AbstractFactory
{
    /**
     * @param $data
     *
     * @return StoryList
     */
    protected function createSeriesList($data)
    {
        return SerieList::create(
            $data['series']['available'],
            $data['series']['returned'],
            $data['series']['collectionURI'],
            $data['series']['items']
        );
    }

    /**
     * @param $data
     *
     * @return StoryList
     */
    protected function createStoriesList($data)
    {
        return StoryList::create(
            $data['stories']['available'],
            $data['stories']['returned'],
            $data['stories']['collectionURI'],
            $data['stories']['items']
        );
    }

    /**
     * @param $data
     *
     * @return EventList
     */
    protected function createEventsList($data)
    {
        return EventList::create(
            $data['events']['available'],
            $data['events']['returned'],
            $data['events']['collectionURI'],
            $data['events']['items']
        );
    }

    /**
     * @param $data
     *
     * @return ComicList
     */
    protected function createComicsList($data)
    {
        return ComicList::create(
            $data['comics']['available'],
            $data['comics']['returned'],
            $data['comics']['collectionURI'],
            $data['comics']['items']
        );
    }

    /**
     * @param $data
     *
     * @return CreatorList
     */
    protected function createCreatorsList($data)
    {
        return CreatorList::create(
            $data['creators']['available'],
            $data['creators']['returned'],
            $data['creators']['collectionURI'],
            $data['creators']['items']
        );
    }

    /**
     * @param $data
     *
     * @return Thumbnail
     */
    protected function createThumbnail($data)
    {
        return Thumbnail::create(
            $data['thumbnail']['path'],
            $data['thumbnail']['extension']
        );
    }

    /**
     * @param $data
     *
     * @return CharacterList
     */
    protected function createCharactersList($data)
    {
        return CharacterList::create(
            $data['characters']['available'],
            $data['characters']['returned'],
            $data['characters']['collectionURI'],
            $data['characters']['items']
        );
    }

    /**
     * @param $data
     *
     * @return ComicSummary
     */
    protected function createComicSummary($data)
    {
        return ComicSummary::create(
            $data['originalIssue']['resourceURI'],
            $data['originalIssue']['name']
        );
    }
} 
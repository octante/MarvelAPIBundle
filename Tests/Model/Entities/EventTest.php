<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Entities;

use Octante\MarvelAPIBundle\Factories\EventFactory;
use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\SerieList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\EventSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: eventEntityIsCreated
     * with: AResourceURI
     * should: setResourceURI
     */
    public function test_eventEntityIsCreated_AResourceURI_setResourceURI()
    {
        $sut = $this->getSUT();
        $resourceURI = $sut->getResourceURI();
        $expected = URI::create('http://gateway.marvel.com/v1/public/events/116');
        $this->assertEquals($expected, $resourceURI);
    }

    /**
     * when: eventEntityIsCreated
     * with: thumbnail
     * should: setThumbnail
     */
    public function test_eventEntityIsCreated_thumbnail_setThumbnail()
    {
        $sut = $this->getSUT();
        $thumbnail = $sut->getThumbnail();
        $expected = Thumbnail::create(
                        'http://i.annihil.us/u/prod/marvel/i/mg/9/40/51ca10d996b8b',
                        'jpg'
                    );

        $this->assertEquals($expected, $thumbnail);
    }

    /**
     * when: eventEntityIsCreated
     * with: creators
     * should: setCreators
     */
    public function test_eventEntityIsCreated_creators_setCreators()
    {
        $sut = $this->getSUT();
        $creators = $sut->getCreators();
        $expected = CreatorList::create(
            115,
            20,
            'http://gateway.marvel.com/v1/public/events/116/creators',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/2707",
                    "name" => "Jeff Albrecht",
                    "role" => "inker",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/2077",
                    "name" => "Hilary Barta",
                    "role" => "inker",
                ],
            ]
        );

        $this->assertEquals($expected, $creators);
    }

    /**
     * when: eventEntityIsCreated
     * with: stories
     * should: setStories
     */
    public function test_eventEntityIsCreated_stories_setStories()
    {
        $sut = $this->getSUT();
        $stories = $sut->getStories();
        $expected = StoryList::create(
            145,
            20,
            'http://gateway.marvel.com/v1/public/events/116/stories',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/12960",
                    "name" => "Cover #12960",
                    "type" => "cover",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/12961",
                    "name" => "Shadows of Alarm..!",
                    "type" => "interiorStory",
                ],
            ]
        );

        $this->assertEquals($expected, $stories);
    }

    /**
     * when: eventEntityIsCreated
     * with: comics
     * should: setComics
     */
    public function test_eventEntityIsCreated_comics_setComics()
    {
        $sut = $this->getSUT();
        $comics = $sut->getComics();
        $expected = ComicList::create(
            52,
            20,
            'http://gateway.marvel.com/v1/public/events/116/comics',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/12744",
                    "name" => "Alpha Flight (1983) #79",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/12746",
                    "name" => "Alpha Flight (1983) #80",
                ],
            ]
        );

        $this->assertEquals($expected, $comics);
    }

    /**
     * when: eventEntityIsCreated
     * with: series
     * should: setSeries
     */
    public function test_eventEntityIsCreated_series_setSeries()
    {
        $sut = $this->getSUT();
        $series = $sut->getSeries();
        $expected = SerieList::create(
            22,
            20,
            'http://gateway.marvel.com/v1/public/events/116/series',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/series/2116",
                    "name" => "Alpha Flight (1983 - 1994)",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/series/1987",
                    "name" => "Amazing Spider-Man (1963 - 1998)",
                ],
            ]
        );

        $this->assertEquals($expected, $series);
    }

    /**
     * when: eventEntityIsCreated
     * with: next
     * should: setNext
     */
    public function test_eventEntityIsCreated_next_setNext()
    {
        $sut = $this->getSUT();
        $next = $sut->getNext();
        $expected = EventSummary::create(
            'http://gateway.marvel.com/v1/public/events/240',
            'Days of Future Present'
        );

        $this->assertEquals($expected, $next);
    }

    /**
     * when: eventEntityIsCreated
     * with: previous
     * should: setPrevious
     */
    public function test_eventEntityIsCreated_previous_setPrevious()
    {
        $sut = $this->getSUT();
        $previous = $sut->getPrevious();
        $expected = EventSummary::create(
            'http://gateway.marvel.com/v1/public/events/233',
            'Atlantis Attacks'
        );

        $this->assertEquals($expected, $previous);
    }

    /**
     * when: eventEntityIsCreated
     * with: characters
     * should: setCharacters
     */
    public function test_eventEntityIsCreated_characters_setCharacters()
    {
        $sut = $this->getSUT();
        $characters = $sut->getCharacters();
        $expected = CharacterList::create(
            67,
            20,
            'http://gateway.marvel.com/v1/public/events/116/characters',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/characters/1010370",
                    "name" => "Alpha Flight",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/characters/1009152",
                    "name" => "Ancient One",
                ],
            ]
        );

        $this->assertEquals($expected, $characters);
    }

    private function getSUT()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getEventsCollection.json');
        $results = json_decode($jsonResponse, true);

        return (new EventFactory())->createEvent($results['data']['results'][0]);
    }
}

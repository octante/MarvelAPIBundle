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

use Octante\MarvelAPIBundle\Factories\SerieFactory;
use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class SerieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: serieEntityIsCreated
     * with: AResourceURI
     * should: setResourceURI
     */
    public function test_serieEntityIsCreated_AResourceURI_setResourceURI()
    {
        $sut = $this->getSUT();
        $resourceURI = $sut->getResourceURI();
        $expected = URI::create('http://gateway.marvel.com/v1/public/series/18454');
        $this->assertEquals($expected, $resourceURI);
    }

    /**
     * when: serieEntityIsCreated
     * with: thumbnail
     * should: setThumbnail
     */
    public function test_serieEntityIsCreated_thumbnail_setThumbnail()
    {
        $sut = $this->getSUT();
        $thumbnail = $sut->getThumbnail();
        $expected = Thumbnail::create(
                        'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available',
                        'jpg'
                    );

        $this->assertEquals($expected, $thumbnail);
    }

    /**
     * when: serieEntityIsCreated
     * with: creators
     * should: setCreators
     */
    public function test_serieEntityIsCreated_creators_setCreators()
    {
        $sut = $this->getSUT();
        $creators = $sut->getCreators();
        $expected = CreatorList::create(
            5,
            5,
            'http://gateway.marvel.com/v1/public/series/18454/creators',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/485",
                    "name" => "Andy Lanning",
                    "role" => "writer",
                ],
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/9432",
                    "name" => "Sean Ryan",
                    "role" => "writer",
                ],
            ]
        );

        $this->assertEquals($expected, $creators);
    }

    /**
     * when: serieEntityIsCreated
     * with: stories
     * should: setStories
     */
    public function test_serieEntityIsCreated_stories_setStories()
    {
        $sut = $this->getSUT();
        $stories = $sut->getStories();
        $expected = StoryList::create(
            10,
            10,
            'http://gateway.marvel.com/v1/public/series/18454/stories',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/110101",
                    "name" => "cover from 100th Anniversary Special (2014) #1",
                    "type" => "cover",
                ],
            ]
        );

        $this->assertEquals($expected, $stories);
    }

    /**
     * when: serieEntityIsCreated
     * with: events
     * should: setEvents
     */
    public function test_serieEntityIsCreated_events_setEvents()
    {
        $sut = $this->getSUT();
        $events = $sut->getEvents();
        $expected = EventList::create(
            0,
            0,
            'http://gateway.marvel.com/v1/public/series/18454/events',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/events/93947",
                    "name" => "Interior #93947",
                ],
            ]
        );

        $this->assertEquals($expected, $events);
    }

    /**
     * when: serieEntityIsCreated
     * with: comics
     * should: setComics
     */
    public function test_serieEntityIsCreated_comics_setComics()
    {
        $sut = $this->getSUT();
        $comics = $sut->getComics();
        $expected = ComicList::create(
            5,
            5,
            'http://gateway.marvel.com/v1/public/series/18454/comics',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/49011",
                    "name" => "100th Anniversary Special (2014) #1",
                ],
            ]
        );

        $this->assertEquals($expected, $comics);
    }

    /**
     * when: characterEntityIsCreated
     * with: characters
     * should: setCharacters
     */
    public function test_characterEntityIsCreated_characters_setCharacters()
    {
        $sut = $this->getSUT();
        $characters = $sut->getCharacters();
        $expected = CharacterList::create(
            0,
            0,
            'http://gateway.marvel.com/v1/public/series/18454/characters',
            [
                [
                    "resourceURI" => "http://gateway.marvel.com/v1/public/characters/1010370",
                    "name" => "Alpha Flight",
                ],
            ]
        );

        $this->assertEquals($expected, $characters);
    }

    private function getSUT()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getSeriesCollection.json');
        $results = json_decode($jsonResponse, true);

        return (new SerieFactory())->createSerie($results['data']['results'][0]);
    }
}

<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Entities;


use Octante\MarvelAPIBundle\Factories\CharacterFactory;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\SerieList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class CharacterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: characterEntityIsCreated
     * with: AResourceURI
     * should: setResourceURI
     */
    function test_characterEntityIsCreated_AResourceURI_setResourceURI()
    {
        $sut = $this->getSUT();
        $resourceURI = $sut->getResourceURI();
        $expected = URI::create('http://gateway.marvel.com/v1/public/characters/1009742');
        $this->assertEquals($expected, $resourceURI);
    }

    /**
     * when: characterEntityIsCreated
     * with: thumbnail
     * should: setThumbnail
     */
    function test_characterEntityIsCreated_thumbnail_setThumbnail()
    {
        $sut = $this->getSUT();
        $thumbnail = $sut->getThumbnail();
        $expected = Thumbnail::create(
                        'http://i.annihil.us/u/prod/marvel/i/mg/c/d0/4ced5ab9078c9',
                        'jpg'
                    );

        $this->assertEquals($expected, $thumbnail);
    }

    /**
     * when: charactersEntityIsCreated
     * with: stories
     * should: setStories
     */
    function test_charactersEntityIsCreated_stories_setStories()
    {
        $sut = $this->getSUT();
        $stories = $sut->getStories();
        $expected = StoryList::create(
            3,
            3,
            'http://gateway.marvel.com/v1/public/characters/1009742/stories',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/82130",
                    "name" => "Interior #82130",
                    "type" => "interiorStory"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/90817",
                    "name" => "Interior #90817",
                    "type" => "interiorStory"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/94784",
                    "name" => "Incredible Hulks (2009) #602, SHS VARIANT",
                    "type" => "cover"
                )
            )
        );

        $this->assertEquals($expected, $stories);
    }

    /**
     * when: charactersEntityIsCreated
     * with: events
     * should: setEvents
     */
    function test_charactersEntityIsCreated_events_setEvents()
    {
        $sut = $this->getSUT();
        $events = $sut->getEvents();
        $expected = EventList::create(
            0,
            0,
            'http://gateway.marvel.com/v1/public/characters/1009742/events',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/events/94784",
                    "name" => "Incredible Hulks (2009) #602, SHS VARIANT"
                )
            )
        );

        $this->assertEquals($expected, $events);
    }

    /**
     * when: charactersEntityIsCreated
     * with: series
     * should: setSeries
     */
    function test_charactersEntityIsCreated_series_setSeries()
    {
        $sut = $this->getSUT();
        $series = $sut->getSeries();
        $expected = SerieList::create(
            2,
            2,
            'http://gateway.marvel.com/v1/public/characters/1009742/series',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/series/3374",
                    "name" => "Hulk (2008 - 2012)"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/series/8842",
                    "name" => "Incredible Hulks (2009 - 2011)"
                )
            )
        );

        $this->assertEquals($expected, $series);
    }

    /**
     * when: charactersEntityIsCreated
     * with: comics
     * should: setComics
     */
    function test_charactersEntityIsCreated_comics_setComics()
    {
        $sut = $this->getSUT();
        $comics = $sut->getComics();
        $expected = ComicList::create(
            3,
            3,
            'http://gateway.marvel.com/v1/public/characters/1009742/comics',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/37047",
                    "name" => "Hulk (2008) #36"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/40023",
                    "name" => "Hulk (2008) #36 (I Am Captain America Variant)"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/29541",
                    "name" => "Incredible Hulks (2009) #602 (SHS VARIANT)"
                )
            )
        );

        $this->assertEquals($expected, $comics);
    }


    private function getSUT()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getCharactersCollection.json');
        $results = json_decode($jsonResponse, true);
        return (new CharacterFactory)->createCharacter($results['data']['results'][0]);
    }
}
 
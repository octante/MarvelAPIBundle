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


use Octante\MarvelAPIBundle\Factories\StoryFactory;
use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\SerieList;
use Octante\MarvelAPIBundle\Model\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class StoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: storyEntityIsCreated
     * with: AResourceURI
     * should: setResourceURI
     */
    function test_storyEntityIsCreated_AResourceURI_setResourceURI()
    {
        $sut = $this->getSUT();
        $resourceURI = $sut->getResourceURI();
        $expected = URI::create('http://gateway.marvel.com/v1/public/stories/3');
        $this->assertEquals($expected, $resourceURI);
    }

    /**
     * when: storyEntityIsCreated
     * with: thumbnail
     * should: setThumbnail
     */
    function test_storyEntityIsCreated_thumbnail_setThumbnail()
    {
        $sut = $this->getSUT();
        $thumbnail = $sut->getThumbnail();
        $expected = Thumbnail::create(
                        'http://i.annihil.us/u/prod/marvel/i/mg/c/30/4fe8cb51f32e0',
                        'jpg'
                    );

        $this->assertEquals($expected, $thumbnail);
    }

    /**
     * when: storyEntityIsCreated
     * with: series
     * should: setSeries
     */
    function test_storyEntityIsCreated_series_setSeries()
    {
        $sut = $this->getSUT();
        $series = $sut->getSeries();
        $expected = SerieList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/stories/3/series',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/series/2",
                    "name" => "Amazing Spider-Man Vol. II: Revelations (2002)",
                )
            )
        );

        $this->assertEquals($expected, $series);
    }

    /**
     * when: storyEntityIsCreated
     * with: creators
     * should: setCreators
     */
    function test_storyEntityIsCreated_creators_setCreators()
    {
        $sut = $this->getSUT();
        $creators = $sut->getCreators();
        $expected = CreatorList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/stories/3/creators',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/485",
                    "name" => "Andy Lanning",
                    "role" => "writer"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/creators/9432",
                    "name" => "Sean Ryan",
                    "role" => "writer"
                )
            )
        );

        $this->assertEquals($expected, $creators);
    }

    /**
     * when: storyEntityIsCreated
     * with: events
     * should: setEvents
     */
    function test_storyEntityIsCreated_events_setEvents()
    {
        $sut = $this->getSUT();
        $events = $sut->getEvents();
        $expected = EventList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/stories/3/events',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/events/93947",
                    "name" => "Interior #93947"
                )
            )
        );

        $this->assertEquals($expected, $events);
    }

    /**
     * when: storyEntityIsCreated
     * with: comics
     * should: setComics
     */
    function test_storyEntityIsCreated_comics_setComics()
    {
        $sut = $this->getSUT();
        $comics = $sut->getComics();
        $expected = ComicList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/stories/3/comics',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/comics/937",
                    "name" => "Amazing Spider-Man Vol. II: Revelations (Trade Paperback)"
                )
            )
        );

        $this->assertEquals($expected, $comics);
    }

    /**
     * when: storyEntityIsCreated
     * with: characters
     * should: setCharacters
     */
    function test_storyEntityIsCreated_characters_setCharacters()
    {
        $sut = $this->getSUT();
        $characters = $sut->getCharacters();
        $expected = CharacterList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/stories/3/characters',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/characters/1010370",
                    "name" => "Alpha Flight"
                )
            )
        );

        $this->assertEquals($expected, $characters);
    }

    /**
     * when: storyEntityIsCreated
     * with: originalIssue
     * should: setOriginalIssue
     */
    function test_storyEntityIsCreated_originalIssue_setOriginalIssue()
    {
        $sut = $this->getSUT();
        $originalIssue = $sut->getOriginalIssue();
        $expected = ComicSummary::create(
            'http://gateway.marvel.com/v1/public/comics/937',
            'Amazing Spider-Man Vol. II: Revelations (Trade Paperback)'
        );

        $this->assertEquals($expected, $originalIssue);
    }

    private function getSUT()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getStoriesCollection.json');
        $results = json_decode($jsonResponse, true);
        return (new StoryFactory)->createStory($results['data']['results'][0]);
    }
}
 
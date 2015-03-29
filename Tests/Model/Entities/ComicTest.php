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


use Octante\MarvelAPIBundle\Factories\ComicFactory;
use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicDate;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;
use Octante\MarvelAPIBundle\Model\ValueObjects\Price;
use Octante\MarvelAPIBundle\Model\ValueObjects\TextObject;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class ComicTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * when: comicEntityIsCreated
     * with: textObjects
     * should: setTextObjects
     */
    function test_comicEntityIsCreated_textObjects_setTextObjects()
    {
        $sut = $this->getSUT();
        $textObjects = $sut->getTextObjects();

        $expected = array(
            TextObject::create(
                'issue_solicit_text',
                'en-us',
                "It's the origin of the original Avenger, Ant-Man! Hank Pym has been known by a variety of names — including Ant-Man, Giant-Man, Goliath and Yellowjacket — he’s been an innovative scientist, a famed super hero, an abusive spouse and more. What demons drive a man like Hank Pym? And how did he begin his heroic career? "
            )
        );

        $this->assertEquals($expected, $textObjects);
    }

    /**
     * when: comicEntityIsCreated
     * with: AResourceURI
     * should: setResourceURI
     */
    function test_comicEntityIsCreated_AResourceURI_setResourceURI()
    {
        $sut = $this->getSUT();
        $resourceURI = $sut->getResourceURI();
        $expected = URI::create('http://gateway.marvel.com/v1/public/comics/41530');
        $this->assertEquals($expected, $resourceURI);
    }

    /**
     * when: comicEntityIsCreated
     * with: series
     * should: setSeries
     */
    function test_comicEntityIsCreated_series_setSeries()
    {
        $sut = $this->getSUT();
        $series = $sut->getSeries();
        $expected = SerieSummary::create(
            'http://gateway.marvel.com/v1/public/series/15481',
            'Ant-Man: So (2011 - Present)'
        );

        $this->assertEquals($expected, $series);
    }
    
    /**
     * when: comicEntityIsCreated
     * with: comics
     * should: setVariants
     */
    function test_comicEntityIsCreated_comics_setVariants()
    {
        $sut = $this->getSUT();
        $variants = $sut->getVariants();
        $expected = array(
            ComicSummary::create(
                'http://variantResourceURINumber1',
                'variant name number 1'
            ),
            ComicSummary::create(
                'http://variantResourceURINumber2',
                'variant name number 2'
            )
        );

        $this->assertEquals($expected, $variants);
    }
    
    /**
     * when: comicEntityIsCreated
     * with: collections
     * should: setCollections
     */
    function test_comicEntityIsCreated_collections_setCollections()
    {
        $sut = $this->getSUT();
        $collections = $sut->getCollections();
        $expected = array(
            ComicSummary::create(
                'http://collectionResourceURINumber1',
                'collection name number 1'
            ),
            ComicSummary::create(
                'http://collectionResourceURINumber2',
                'collection name number 2'
            )
        );

        $this->assertEquals($expected, $collections);
    }

    /**
     * when: comicEntityIsCreated
     * with: collectedIssues
     * should: setCollectedIssues
     */
    function test_comicEntityIsCreated_collectedIssues_setCollectedIssues()
    {
        $sut = $this->getSUT();
        $collectedIssues = $sut->getCollectedIssues();
        $expected = array(
            ComicSummary::create(
                'http://collectedIssuesResourceURINumber1',
                'collected issues name number 1'
            ),
            ComicSummary::create(
                'http://collectedIssuesResourceURINumber2',
                'collected issues name number 2'
            )
        );

        $this->assertEquals($expected, $collectedIssues);
    }

    /**
     * when: comicEntityIsCreated
     * with: dates
     * should: setDates
     */
    function test_comicEntityIsCreated_dates_setDates()
    {
        $sut = $this->getSUT();
        $dates = $sut->getDates();
        $expected = array(
            ComicDate::create(
                'onsaleDate',
                '2020-12-31T00:00:00-0500'
            ),
            ComicDate::create(
                'focDate',
                '2020-12-16T00:00:00-0500'
            )
        );

        $this->assertEquals($expected, $dates);
    }

    /**
     * when: comicEntityIsCreated
     * with: prices
     * should: setPrices
     */
    function test_comicEntityIsCreated_prices_setPrices()
    {
        $sut = $this->getSUT();
        $prices = $sut->getPrices();
        $expected = array(
            Price::create(
                'printPrice',
                19.99
            )
        );

        $this->assertEquals($expected, $prices);
    }

    /**
     * when: comicEntityIsCreated
     * with: thumbnail
     * should: setThumbnail
     */
    function test_comicEntityIsCreated_thumbnail_setThumbnail()
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
     * when: comicEntityIsCreated
     * with: images
     * should: setImages
     */
    function test_comicEntityIsCreated_images_setImages()
    {
        $sut = $this->getSUT();
        $images = $sut->getImages();
        $expected = array(
            Image::create(
                'http://i.annihil.us/u/prod/marvel/i/mg/c/30/4fe8cb51f32e0',
                'jpg'
            )
        );

        $this->assertEquals($expected, $images);
    }

    /**
     * when: comicEntityIsCrated
     * with: creators
     * should: setCreators
     */
    function test_comicEntityIsCrated_creators_setCreators()
    {
        $sut = $this->getSUT();
        $creators = $sut->getCreators();
        $expected = CreatorList::create(
            1,
            1,
            'http://gateway.marvel.com/v1/public/comics/41530/creators',
            array(
                array(
                    'resourceURI' => 'http://gateway.marvel.com/v1/public/creators/4430',
                    'name' => 'Jeff Young',
                    'role' => 'editor'
                )
            )
        );

        $this->assertEquals($expected, $creators);
    }

    /**
     * when: comicEntityIsCrated
     * with: characters
     * should: setCharacters
     */
    function test_comicEntityIsCrated_charactes_setCharacters()
    {
        $sut = $this->getSUT();
        $characters = $sut->getCharacters();
        $expected = CharacterList::create(
            0,
            0,
            'http://gateway.marvel.com/v1/public/comics/41530/characters',
            array(
                array(
                    'resourceURI' => 'http://gateway.marvel.com/v1/public/characters/4430',
                    'name' => 'Jeff Young'
                )
            )
        );

        $this->assertEquals($expected, $characters);
    }

    /**
     * when: comicsEntityIsCreated
     * with: stories
     * should: setStories
     */
    function test_comicsEntityIsCreated_stories_setStories()
    {
        $sut = $this->getSUT();
        $stories = $sut->getStories();
        $expected = StoryList::create(
            2,
            2,
            'http://gateway.marvel.com/v1/public/comics/41530/stories',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/93946",
                    "name" => "Cover #93946",
                    "type" => "cover"
                ),
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/stories/93947",
                    "name" => "Interior #93947",
                    "type" => "interiorStory"
                )
            )
        );

        $this->assertEquals($expected, $stories);
    }

    /**
     * when: comicsEntityIsCreated
     * with: events
     * should: setEvents
     */
    function test_comicsEntityIsCreated_events_setEvents()
    {
        $sut = $this->getSUT();
        $events = $sut->getEvents();
        $expected = EventList::create(
            0,
            0,
            'http://gateway.marvel.com/v1/public/comics/41530/events',
            array(
                array(
                    "resourceURI" => "http://gateway.marvel.com/v1/public/events/93947",
                    "name" => "Interior #93947"
                )
            )
        );

        $this->assertEquals($expected, $events);
    }


    private function getSUT()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getComicsCollection.json');
        $results = json_decode($jsonResponse, true);
        return (new ComicFactory)->createComic($results['data']['results'][0]);
    }
}
 
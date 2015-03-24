<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 13:20
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Entities\Comic;
use Octante\MarvelAPIBundle\Lists\CharacterList;
use Octante\MarvelAPIBundle\Lists\CreatorList;
use Octante\MarvelAPIBundle\Lists\StoryList;
use Octante\MarvelAPIBundle\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Summaries\SeriesSummary;
use Octante\MarvelAPIBundle\ValueObjects\ComicDate;
use Octante\MarvelAPIBundle\ValueObjects\ComicId;
use Octante\MarvelAPIBundle\ValueObjects\Image;
use Octante\MarvelAPIBundle\ValueObjects\Price;
use Octante\MarvelAPIBundle\ValueObjects\Thumbnail;
use Octante\MarvelAPIBundle\ValueObjects\URI;
use Octante\MarvelAPIBundle\ValueObjects\TextObject;
use Octante\MarvelAPIBundle\Lists\EventList;

class ComicFactory extends AbstractResourceFactory
{
    public function createComic($comicData)
    {
        $comic = Comic::create(ComicId::create($comicData['id']));

        if (isset($comicData['digitalId'])) {
            $comic->setDigitalId($comicData['digitalId']);
        }
        if (isset($comicData['title'])) {
            $comic->setTitle($comicData['title']);
        }
        if (isset($comicData['issueNumber'])) {
            $comic->setIssueNumber($comicData['issueNumber']);
        }
        if (isset($comicData['variantDescription'])){
            $comic->setVariantDescription($comicData['variantDescription']);
        }
        if (isset($comicData['description'])){
            $comic->setDescription($comicData['description']);
        }
        if (isset($comicData['modified'])){
            $comic->setModified($comicData['modified']);
        }
        if (isset($comicData['isbn'])) {
            $comic->setIsbn($comicData['isbn']);
        }
        if (isset($comicData['upc'])) {
            $comic->setUpc($comicData['upc']);
        }
        if (isset($comicData['diamondCode'])) {
            $comic->setDiamondCode($comicData['diamondCode']);
        }
        if (isset($comicData['ean'])) {
            $comic->setEan($comicData['ean']);
        }
        if (isset($comicData['issn'])) {
            $comic->setIssn($comicData['issn']);
        }
        if (isset($comicData['format'])) {
            $comic->setFormat($comicData['format']);
        }
        if (isset($comicData['pageCount'])) {
            $comic->setPageCount($comicData['pageCount']);
        }
        if (!empty($comicData['textObjects'])) {
            $comic->setTextObjects($this->getTextObjects($comicData['textObjects']));
        }
        if (isset($comicData['resourceURI'])) {
            $comic->setResourceURI(URI::create($comicData['resourceURI']));
        }
        if (isset($comicData['urls'])) {
            $comic->setUrls($comicData['urls']);
        }
        if (!empty($comicData['series'])) {
            $comic->setSeries($this->getSeries($comicData['series']));
        }
        if (!empty($comicData['variants'])) {
            $comic->setVariants($this->getComicSummaryList($comicData['variants']));
        }
        if (!empty($comicData['collections'])) {
            $comic->setCollections($this->getComicSummaryList($comicData['collections']));
        }
        if (!empty($comicData['collectedIssues'])) {
            $comic->setCollectedIssues($this->getComicSummaryList($comicData['collectedIssues']));
        }
        if (!empty($comicData['dates'])) {
            $comic->setDates($this->getComicDates($comicData['dates']));
        }
        if (!empty($comicData['prices'])) {
            $comic->setPrices($this->getPrices($comicData['prices']));
        }
        if (!empty($comicData['thumbnail'])) {
            $comic->setThumbnail(
                Thumbnail::create(
                    $comicData['thumbnail']['path'],
                    $comicData['thumbnail']['extension']
                )
            );
        }
        if (!empty($comicData['images'])) {
            $comic->setImages($this->getImages($comicData['images']));
        }
        if (!empty($comicData['creators'])) {
            $creators = CreatorList::create(
                $comicData['creators']['available'],
                $comicData['creators']['returned'],
                $comicData['creators']['collectionURI'],
                $comicData['creators']['items']
            );
            $comic->setCreators($creators);
        }
        if (!empty($comicData['characters'])) {
            $characters = CharacterList::create(
                $comicData['characters']['available'],
                $comicData['characters']['returned'],
                $comicData['characters']['collectionURI'],
                $comicData['characters']['items']
            );
            $comic->setCharacters($characters);
        }
        if (!empty($comicData['stories'])) {
            $stories = StoryList::create(
                $comicData['stories']['available'],
                $comicData['stories']['returned'],
                $comicData['stories']['collectionURI'],
                $comicData['stories']['items']
            );
            $comic->setStories($stories);
        }
        if (!empty($comicData['events'])) {
            $events = EventList::create(
                $comicData['events']['available'],
                $comicData['events']['returned'],
                $comicData['events']['collectionURI'],
                $comicData['events']['items']
            );
            $comic->setEvents($events);
        }

        return $comic;
    }

    /**
     * @param $comicData
     *
     * @return SeriesSummary
     */
    protected function getSeries($comicData)
    {
        return SeriesSummary::create($comicData['resourceURI'], $comicData['name']);
    }

    /**
     * @param $comicData
     *
     * @return array
     */
    protected function getTextObjects($comicData)
    {
        $textObjects = array();
        foreach ($comicData as $textObject) {
            $textObjects[] = TextObject::create(
                    $textObject['type'],
                    $textObject['language'],
                    $textObject['text']
            );
        }

        return $textObjects;
    }

    /**
     * @param $comicData
     *
     * @return array
     */
    protected function getComicSummaryList($comicData)
    {
        $collections = array();
        foreach ($comicData as $comicSummary) {
            $collections[] = ComicSummary::create(
                                $comicSummary['resourceURI'],
                                $comicSummary['name']
                             );
        }

        return $collections;
    }

    /**
     * @param $comicData
     *
     * @return array
     */
    protected function getComicDates($comicData)
    {
        $dates = array();
        foreach ($comicData as $comicDates) {
            $dates[] = ComicDate::create(
                            $comicDates['type'],
                            $comicDates['date']
                        );
        }

        return $dates;
    }

    /**
     * @param $comicData
     *
     * @return array
     */
    protected function getPrices($comicData)
    {
        $prices = array();
        foreach ($comicData as $price) {
            $prices[] = Price::create(
                            $price['type'],
                            $price['price']
                        );
        }

        return $prices;
    }

    /**
     * @param $comicData
     *
     * @return array
     */
    protected function getImages($comicData)
    {
        $images = array();
        foreach ($comicData as $image) {
            $images[] = Image::create(
                            $image['path'],
                            $image['extension']
                        );
        }

        return $images;
    }
} 
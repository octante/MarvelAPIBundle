<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 13:20
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Model\Entities\Comic;
use Octante\MarvelAPIBundle\Model\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicDate;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;
use Octante\MarvelAPIBundle\Model\ValueObjects\Price;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;
use Octante\MarvelAPIBundle\Model\ValueObjects\TextObject;

class ComicFactory extends AbstractFactory
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
            $comic->setThumbnail($this->createThumbnail($comicData));
        }
        if (!empty($comicData['images'])) {
            $comic->setImages($this->getImages($comicData['images']));
        }
        if (!empty($comicData['creators'])) {
            $comic->setCreators($this->createCreatorsList($comicData));
        }
        if (!empty($comicData['characters'])) {
            $comic->setCharacters($this->createCharactersList($comicData));
        }
        if (!empty($comicData['stories'])) {
            $comic->setStories($this->createStoriesList($comicData));
        }
        if (!empty($comicData['events'])) {
            $comic->setEvents($this->createEventsList($comicData));
        }

        return $comic;
    }

    /**
     * @param $comicData
     *
     * @return SerieSummary
     */
    protected function getSeries($comicData)
    {
        return SerieSummary::create($comicData['resourceURI'], $comicData['name']);
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
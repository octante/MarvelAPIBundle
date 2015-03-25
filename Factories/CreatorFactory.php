<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 13:20
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Entities\Creator;
use Octante\MarvelAPIBundle\Summaries\ComicSummary;
use Octante\MarvelAPIBundle\Summaries\SeriesSummary;
use Octante\MarvelAPIBundle\ValueObjects\ComicDate;
use Octante\MarvelAPIBundle\ValueObjects\ComicId;
use Octante\MarvelAPIBundle\ValueObjects\Image;
use Octante\MarvelAPIBundle\ValueObjects\Price;
use Octante\MarvelAPIBundle\ValueObjects\TextObject;

class CreatorFactory extends AbstractFactory
{
    public function createCreator($creatorData)
    {
        $creator = Creator::create(ComicId::create($creatorData['id']));

        if (isset($creatorData['firstName'])) {
            $creator->setFirstName($creatorData['firstName']);
        }
        if (isset($creatorData['middleName'])) {
            $creator->setMiddleName($creatorData['middleName']);
        }
        if (isset($creatorData['lastName'])) {
            $creator->setLastName($creatorData['lastName']);
        }
        if (isset($creatorData['suffix'])){
            $creator->setSuffix($creatorData['suffix']);
        }
        if (isset($creatorData['fullName'])){
            $creator->setFullName($creatorData['fullName']);
        }
        if (isset($creatorData['modified'])){
            $creator->setModified($creatorData['modified']);
        }
        if (isset($creatorData['resourceURI'])) {
            $creator->setResourceURI($creatorData['resourceURI']);
        }
        if (isset($creatorData['urls'])) {
            $creator->setUrls($creatorData['urls']);
        }
        if (!empty($creatorData['thumbnail'])) {
            $creator->setThumbnails($this->createThumbnail($creatorData));
        }
        if (!empty($characterData['series'])) {
            $creator->setSeries($this->createSeriesList($creatorData));
        }
        if (!empty($creatorData['stories'])) {
            $creator->setStories($this->createStoriesList($creatorData));
        }
        if (!empty($creatorData['events'])) {
            $creator->setEvents($this->createEventsList($creatorData));
        }
        if (!empty($characterData['comics'])) {
            $creator->setComics($this->createComicsList($creatorData));
        }

        return $creator;
    }
} 
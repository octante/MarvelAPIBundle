<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Model\Entities\Creator;
use Octante\MarvelAPIBundle\Model\ValueObjects\CreatorId;

class CreatorFactory extends AbstractFactory
{
    public function createCreator($creatorData)
    {
        $creator = Creator::create(CreatorId::create($creatorData['id']));

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
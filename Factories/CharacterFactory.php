<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 13:20
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Entities\Character;
use Octante\MarvelAPIBundle\ValueObjects\CharacterId;
use Octante\MarvelAPIBundle\ValueObjects\URI;

class CharacterFactory extends AbstractFactory
{
    public function createCharacter($characterData)
    {
        $character = Character::create(CharacterId::create($characterData['id']));

        if (isset($characterData['name'])) {
            $character->setName($characterData['name']);
        }
        if (isset($characterData['description'])) {
            $character->setDescription($characterData['description']);
        }
        if (isset($characterData['modified'])){
            $character->setModified($characterData['modified']);
        }
        if (isset($characterData['resourceURI'])) {
            $character->setResourceURI(URI::create($characterData['resourceURI']));
        }
        if (isset($characterData['urls'])) {
            $character->setUrls($characterData['urls']);
        }
        if (!empty($characterData['thumbnail'])) {
            $character->setThumbnail($this->createThumbnail($characterData));
        }
        if (!empty($characterData['stories'])) {
            $character->setStories($this->createStoriesList($characterData));
        }
        if (!empty($characterData['events'])) {
            $character->setEvents($this->createEventsList($characterData));
        }
        if (!empty($characterData['series'])) {
            $character->setSeries($this->createSeriesList($characterData));
        }
        if (!empty($characterData['comics'])) {
            $character->setComics($this->createComicsList($characterData));
        }

        return $character;
    }
} 
<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Repositories;


use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Model\Collections\SeriesCollection;
use Octante\MarvelAPIBundle\Model\Collections\StoriesCollection;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\CharacterQuery;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId;

class CharactersRepository
{
    /**
     * @var \Octante\MarvelAPIBundle\Lib\Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param CharacterQuery $query
     *
     * @return CharactersCollection
     */
    public function getCharacters(CharacterQuery $query)
    {
        $baseURL = BaseURL::create('characters');
        $data = $this->client
                     ->send($baseURL->getURL() . $query->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     *
     * @return CharactersCollection
     */
    public function getCharacterById($characterId)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId()
        );

        $data = $this->client
                     ->send($baseUrl->getURL());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return ComicsCollection
     */
    public function getComicsFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'comics'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $characterQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return EventsCollection
     */
    public function getEventsFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'events'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $characterQuery->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return SeriesCollection
     */
    public function getSeriesFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'series'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $characterQuery->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return StoriesCollection
     */
    public function getStoriesFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'stories'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $characterQuery->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }
} 
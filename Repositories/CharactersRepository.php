<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\CharacterQuery;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId;

class CharactersRepository
{
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
                     ->send($baseURL->getURL() . '?' . $query->getQuery());

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
     * @return CharactersCollection
     */
    public function getComicsFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'comics'
        );

        return $this->getCharactersCollection($baseUrl, $characterQuery);
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return CharactersCollection
     */
    public function getEventsFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'events'
        );

        return $this->getCharactersCollection($baseUrl, $characterQuery);
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return CharactersCollection
     */
    public function getSeriesFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'series'
        );

        return $this->getCharactersCollection($baseUrl, $characterQuery);
    }

    /**
     * @param int $characterId
     * @param CharacterQuery $characterQuery
     *
     * @return CharactersCollection
     */
    public function getStoriesFromCharacter($characterId, CharacterQuery $characterQuery)
    {
        $baseUrl = BaseURL::create(
            'characters',
            CharacterId::create($characterId)->getCharacterId(),
            'stories'
        );

        return $this->getCharactersCollection($baseUrl, $characterQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param CharacterQuery $characterQuery
     *
     * @return CharactersCollection
     */
    private function getCharactersCollection($baseUrl, $characterQuery)
    {
        $data = $this->client
                     ->send($baseUrl->getURL() . '?' . $characterQuery->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }
} 
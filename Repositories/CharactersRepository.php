<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Query\CharacterQuery;
use Octante\MarvelAPIBundle\Lib\Client;

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
        $data = $this->client
                     ->send($query->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $characterId
     */
    public function getCharacterById($characterId)
    {
        // TO IMPLEMENT
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\ComicQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicId;

class ComicsRepository
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
     * @param ComicQuery $query
     *
     * @return ComicsCollection
     */
    public function getComics(ComicQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param ComicId $comicId
     *
     * @return ComicsCollection
     */
    public function getComicById(ComicId $comicId)
    {
        $baseUrl = BaseURL::create('comics', $comicId->getComicId());

        $data = $this->client
            ->send($baseUrl->getURL());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param ComicId $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getCharactersFromComic(ComicId $comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create('comics', $comicId->getComicId(), 'characters');

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param ComicId $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getEventsFromComic(ComicId $comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create('comics', $comicId->getComicId(), 'events');

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param ComicId $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getCreatorsFromComic(ComicId $comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create('comics', $comicId->getComicId(), 'creators');

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param ComicId $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getStoriesFromComic(ComicId $comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create('comics', $comicId->getComicId(), 'stories');

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    private function getComicsCollection($baseUrl, $comicQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $comicQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }
} 
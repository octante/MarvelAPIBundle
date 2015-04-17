<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Factories;

use Octante\MarvelAPIBundle\Model\Entities\Serie;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\SerieId;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

/**
 * Class SerieFactory
 */
class SerieFactory extends AbstractFactory
{
    /**
     * @param $serieData
     *
     * @return Serie
     */
    public function createSerie($serieData)
    {
        $serie = Serie::create(SerieId::create($serieData['id']));

        if (isset($serieData['title'])) {
            $serie->setTitle($serieData['title']);
        }
        if (isset($serieData['description'])) {
            $serie->setDescription($serieData['description']);
        }
        if (isset($serieData['modified'])) {
            $serie->setModified($serieData['modified']);
        }
        if (isset($serieData['resourceURI'])) {
            $serie->setResourceURI(URI::create($serieData['resourceURI']));
        }
        if (isset($serieData['urls'])) {
            $serie->setUrls($serieData['urls']);
        }
        if (isset($serieData['startYear'])) {
            $serie->setStartYear($serieData['startYear']);
        }
        if (isset($serieData['endYear'])) {
            $serie->setEndYear($serieData['endYear']);
        }
        if (isset($serieData['rating'])) {
            $serie->setRating($serieData['rating']);
        }
        if (!empty($serieData['thumbnail'])) {
            $serie->setThumbnail($this->createThumbnail($serieData));
        }
        if (!empty($serieData['comics'])) {
            $serie->setComics($this->createComicsList($serieData));
        }
        if (!empty($serieData['stories'])) {
            $serie->setStories($this->createStoriesList($serieData));
        }
        if (!empty($serieData['events'])) {
            $serie->setEvents($this->createEventsList($serieData));
        }
        if (!empty($serieData['characters'])) {
            $serie->setCharacters($this->createCharactersList($serieData));
        }
        if (!empty($serieData['creators'])) {
            $serie->setCreators($this->createCreatorsList($serieData));
        }
        if (isset($serieData['next'])) {
            $seriesSummary = SerieSummary::create(
                $serieData['next']['resourceURI'],
                $serieData['next']['name']
            );
            $serie->setNext($seriesSummary);
        }
        if (isset($serieData['previous'])) {
            $seriesSummary = SerieSummary::create(
                $serieData['previous']['resourceURI'],
                $serieData['previous']['name']
            );
            $serie->setPrevious($seriesSummary);
        }

        return $serie;
    }
}

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

use Octante\MarvelAPIBundle\Model\Entities\Story;
use Octante\MarvelAPIBundle\Model\ValueObjects\StoryId;
use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class StoryFactory extends AbstractFactory
{
    /**
     * @param $storyData
     *
     * @return Story
     */
    public function createStory($storyData)
    {
        $serie = Story::create(StoryId::create($storyData['id']));

        if (isset($storyData['title'])) {
            $serie->setTitle($storyData['title']);
        }
        if (isset($storyData['description'])) {
            $serie->setDescription($storyData['description']);
        }
        if (isset($storyData['modified'])){
            $serie->setModified($storyData['modified']);
        }
        if (isset($storyData['resourceURI'])) {
            $serie->setResourceURI(URI::create($storyData['resourceURI']));
        }
        if (!empty($storyData['thumbnail'])) {
            $serie->setThumbnail($this->createThumbnail($storyData));
        }
        if (!empty($storyData['comics'])) {
            $serie->setComics($this->createComicsList($storyData));
        }
        if (!empty($storyData['series'])) {
            $serie->setSeries($this->createSeriesList($storyData));
        }
        if (!empty($storyData['events'])) {
            $serie->setEvents($this->createEventsList($storyData));
        }
        if (!empty($storyData['characters'])) {
            $serie->setCharacters($this->createCharactersList($storyData));
        }
        if (!empty($storyData['creators'])) {
            $serie->setCreators($this->createCreatorsList($storyData));
        }
        if (!empty($storyData['originalIssue'])) {
            $serie->setOriginalIssue($this->createComicSummary($storyData));
        }

        return $serie;
    }
} 
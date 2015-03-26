<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:35
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


class Image
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $extension;

    /**
     * @param $path
     * @param $extension
     */
    private function __construct($path, $extension)
    {
        $this->path = $path;
        $this->extension = $extension;
    }

    /**
     * @param $path
     * @param $extension
     *
     * @return Image
     */
    public static function create($path, $extension)
    {
        return new Image($path, $extension);
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
} 
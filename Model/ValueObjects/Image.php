<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
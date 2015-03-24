<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:35
 */

namespace Octante\MarvelAPIBundle\ValueObjects;


class Thumbnail
{
    /**
     * @param $path
     * @param $extension
     *
     * @return Image
     */
    public static function create($path, $extension)
    {
        return Image::create($path, $extension);
    }
} 
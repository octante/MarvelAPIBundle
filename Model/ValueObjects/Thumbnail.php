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
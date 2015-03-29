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


class ComicDate
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $date;

    /**
     * @param $type
     * @param $date
     */
    private function __construct($type, $date)
    {
        $this->type = $type;
        $this->date = $date;
    }

    /**
     * @param $type
     * @param $date
     *
     * @todo Verify date format. Dates are preferably formatted as YYYY-MM-DD but may be sent as any
     * common date format. If invalid format throw an exception.
     *
     * @return ComicDate
     */
    public static function create($type, $date)
    {
        return new ComicDate($type, $date);
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
} 
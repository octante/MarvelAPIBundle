<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;

use Octante\MarvelAPIBundle\Model\DataContainer\DataContainer;

class DataWrapper
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $copyright;

    /**
     * @var string
     */
    private $attributionText;

    /**
     * @var string
     */
    private $attributionHTML;

    /**
     * @var DataContainer
     */
    private $data;

    /**
     * @var string
     */
    private $etag;

    /**
     * @param $code
     * @param $status
     * @param $copyright
     * @param $attributionText
     * @param $attributionHTML
     * @param $data
     * @param $etag
     */
    private function __construct(
        $code,
        $status,
        $copyright,
        $attributionText,
        $attributionHTML,
        DataContainer $data,
        $etag
    ) {
        $this->code = $code;
        $this->status = $status;
        $this->copyright = $copyright;
        $this->attributionText = $attributionText;
        $this->attributionHTML = $attributionHTML;
        $this->data = $data;
        $this->etag = $etag;
    }

    /**
     * @param $code
     * @param $status
     * @param $copyright
     * @param $attributionText
     * @param $attributionHTML
     * @param $data             // This field must be a ComicDataContainer
     * @param $etag
     *
     * @todo Some validations for code and status fields
     *
     * @return DataWrapper
     */
    public static function create(
        $code,
        $status,
        $copyright,
        $attributionText,
        $attributionHTML,
        DataContainer $data,
        $etag
    ) {
        return new DataWrapper(
            $code,
            $status,
            $copyright,
            $attributionText,
            $attributionHTML,
            $data,
            $etag
        );
    }

    /**
     * @return string
     */
    public function getAttributionHTML()
    {
        return $this->attributionHTML;
    }

    /**
     * @return string
     */
    public function getAttributionText()
    {
        return $this->attributionText;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @return DataContainer
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

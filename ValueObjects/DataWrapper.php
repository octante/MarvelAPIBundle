<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\ValueObjects;


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
    ){
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
    ){
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
     * @return mixed
     */
    public function getAttributionHTML()
    {
        return $this->attributionHTML;
    }

    /**
     * @return mixed
     */
    public function getAttributionText()
    {
        return $this->attributionText;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
} 
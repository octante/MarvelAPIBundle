<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:03
 */

namespace Octante\MarvelAPIBundle\ValueObjects;


class TextObject
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $text;

    /**
     * @param $type
     * @param $language
     * @param $text
     *
     * @todo Language validation.
     * @see http://en.wikipedia.org/wiki/IETF_language_tag
     */
    private function __construct($type, $language, $text)
    {
        $this->type = $type;
        $this->language = $language;
        $this->text = $text;
    }

    /**
     * @param $type
     * @param $language
     * @param $text
     *
     * @return TextObject
     */
    public static function create($type, $language, $text)
    {
        return new TextObject($type, $language, $text);
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


} 
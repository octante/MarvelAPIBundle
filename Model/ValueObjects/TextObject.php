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

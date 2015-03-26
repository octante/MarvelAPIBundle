<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 11:04
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;


class Price
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $price;

    /**
     * @param $type
     * @param $price
     */
    private function __construct($type, $price)
    {
        $this->type = $type;
        $this->price = $price;
    }

    /**
     * @param $type
     * @param $price
     *
     * @throws \InvalidArgumentException
     *
     * @return Price
     */
    public static function create($type, $price)
    {
        if (!is_numeric($price)) {
            throw new \InvalidArgumentException("Price has an invalid format \"$price\"");
        }
        return new Price($type, $price);
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
} 
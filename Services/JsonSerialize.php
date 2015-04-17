<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Services;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerialize
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new GetSetMethodNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param $data
     *
     * @return string
     */
    public function encode($data)
    {
        return $this->serializer->serialize($data, 'json');
    }
}

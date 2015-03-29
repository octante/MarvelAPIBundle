<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * MarvelAPIBundle configuration class.
 *
 */
class Configuration implements ConfigurationInterface
{
    private $debug;

    /**
     * @param $debug
     */
    public function __construct($debug)
    {
        $this->debug = (Boolean) $debug;
    }

    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder();
        $rootNode = $tree->root('octante_marvel_api');
        $rootNode
            ->children()
                ->scalarNode('marvel_public_key')->end()
                ->scalarNode('marvel_private_key')->end()
            ->end()
        ;

        return $tree;
    }
}

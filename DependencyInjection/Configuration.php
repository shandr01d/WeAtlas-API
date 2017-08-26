<?php

namespace Shandra\WeatlasApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('shandra_weatlas_api');
        
        $rootNode
            ->children()
                ->scalarNode('aid')
                ->end()
                ->scalarNode('key')
                ->end()
            ->end();

        return $treeBuilder;
    }
}

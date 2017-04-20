<?php

namespace Williams\ErpBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('williams_logicbroker');

        $rootNode->children()
                ->arrayNode('ftp')
                    ->children()
                        ->scalarNode('host')->end()
                        ->scalarNode('username')->end()
                        ->scalarNode('password')->end()
                    ->end()
                ->end()
                ->scalarNode('handler')->end()
            ->end();

        return $treeBuilder;
    }

}

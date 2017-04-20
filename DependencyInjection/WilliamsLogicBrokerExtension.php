<?php

namespace Williams\ErpBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class WilliamsLogicBrokerExtension extends Extension {

    public function load(array $configs, ContainerBuilder $container) {

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
                $container, new FileLocator(__DIR__ . '/../Resources/config'));

        $container->setParameter('williams_logicbroker_ftp.host', $config['ftp']['host']);
        $container->setParameter('williams_logicbroker_ftp.username', $config['ftp']['username']);
        $container->setParameter('williams_logicbroker_ftp.password', $config['ftp']['password']);
        $container->setParameter('williams_logicbroker_handler', $config['handler']);
        
        $loader->load('services.yml');
    }

}

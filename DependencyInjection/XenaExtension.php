<?php

namespace Pivchenberg\XenaBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class XenaExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        // get all bundles
        $bundles = $container->getParameter('kernel.bundles');

        // determine if StofDoctrineExtensionsBundle & DoctrineBundle is registered
        if (isset($bundles['StofDoctrineExtensionsBundle']) && isset($bundles['DoctrineBundle'])) {

            $extensions = $container->getExtensions();
            if (isset($extensions['doctrine']) && isset($extensions['stof_doctrine_extensions'])) {
                $config = Yaml::parse(
                    file_get_contents(__DIR__ . '/../Resources/config/config_prepend.yml')
                );

                $container->prependExtensionConfig('doctrine', $config['doctrine']);
                $container->prependExtensionConfig('stof_doctrine_extensions', $config['stof_doctrine_extensions']);
            }
        }
    }
}

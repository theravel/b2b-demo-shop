<?php

namespace Pyz\Zed\HelloSpryker;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class HelloSprykerDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_STRING_REVERSER = 'FACADE_STRING_REVERSER';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addStringReverserFacade($container);

        return $container;
    }

    protected function addStringReverserFacade(Container $container): Container
    {
        $container->set(static::FACADE_STRING_REVERSER, function (Container $container) {
            return $container->getLocator()->stringReverser()->facade();
        });

        return $container;
    }
}

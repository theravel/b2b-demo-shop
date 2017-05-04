<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ProductDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_PRODUCT_OPTION = 'CLIENT_PRODUCT_OPTION';
    const CLIENT_AVAILABILITY = 'CLIENT_AVAILABILITY';
    const CLIENT_PRODUCT_GROUP = 'CLIENT_PRODUCT_GROUP';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[self::CLIENT_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->client();
        };

        $container[self::CLIENT_AVAILABILITY] = function (Container $container) {
            return $container->getLocator()->availability()->client();
        };

        $container[self::CLIENT_PRODUCT_GROUP] = function (Container $container) {
            return $container->getLocator()->productGroup()->client();
        };

        return $container;
    }

}

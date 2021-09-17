<?php

namespace Pyz\Yves\CheckoutPage\Plugin\Router;

use Spryker\Yves\Router\Route\RouteCollection;
use SprykerShop\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin as SprykerCheckoutPageRouteProviderPlugin;

class CheckoutPageRouteProviderPlugin extends SprykerCheckoutPageRouteProviderPlugin
{
    public const CHECKOUT_VOUCHER = 'checkout-voucher';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @api
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = parent::addRoutes($routeCollection);
        $routeCollection = $this->addVoucherStepRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    private function addVoucherStepRoute(RouteCollection $routeCollection)
    {
        $route = $this->buildRoute('/checkout/voucher', 'CheckoutPage', 'Checkout', 'voucherAction');
        $route = $route->setMethods(['GET', 'POST']);
        $routeCollection->add(static::CHECKOUT_VOUCHER, $route);

        return $routeCollection;
    }
}

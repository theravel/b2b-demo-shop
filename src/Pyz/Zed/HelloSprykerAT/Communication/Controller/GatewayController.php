<?php

namespace Pyz\Zed\HelloSprykerAT\Communication\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Communication\Controller\GatewayController as GatewayControllerBase;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacadeInterface getFacade()
 */
class GatewayController extends GatewayControllerBase
{
    /**
     * @param \Generated\Shared\Transfer\HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return \Generated\Shared\Transfer\HelloSprykerTransfer
     */
    public function reverseStringAction(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $helloSprykerTransfer->setReversedString($helloSprykerTransfer->getOriginalString());

        return $helloSprykerTransfer;
    }
}

<?php

namespace Pyz\Zed\HelloSpryker\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface HelloSprykerFacadeInterface
{
    /**
     * Specification:
     * - Reverses string.
     *
     * @param string $stringToReverse
     *
     * @return string
     * @api
     *
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
}

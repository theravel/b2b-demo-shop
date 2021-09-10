<?php

namespace Pyz\Zed\HelloSprykerAT\Communication\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Zed\HelloSpryker\Communication\Controller\IndexController as IndexControllerBase;

class IndexController extends IndexControllerBase
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $helloSprykerTransfer = new HelloSprykerTransfer();
        $helloSprykerTransfer->setOriginalString("Dima, Hello Spryker!");
        /** @var HelloSprykerTransfer $helloSprykerTransfer */
        $helloSprykerTransfer = $this->getFacade()->reverseString($helloSprykerTransfer);

        return ['string' => $helloSprykerTransfer->getOriginalString()];
    }
}

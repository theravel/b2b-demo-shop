<?php

namespace Pyz\Zed\StringReverser\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param string $originalString
     *
     * @return string
     * @api
     *
     */
    public function manipulateString(string $originalString): string
    {
        return $this->getFactory()
            ->createStringManipulator()
            ->reverse($originalString);
    }
}

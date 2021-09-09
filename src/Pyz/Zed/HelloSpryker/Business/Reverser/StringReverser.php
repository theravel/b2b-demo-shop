<?php

namespace Pyz\Zed\HelloSpryker\Business\Reverser;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\StringReverser\Business\StringReverserFacadeInterface;

class StringReverser implements StringReverserInterface
{
    public function __construct(
        private StringReverserFacadeInterface $reverserFacade,
    ) {}

    /**
     * @param string $stringToReverse
     *
     * @return string
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $reversedString = $this->reverserFacade->manipulateString($helloSprykerTransfer->getOriginalString());
        $helloSprykerTransfer->setReversedString($reversedString);

        return $helloSprykerTransfer;
    }
}

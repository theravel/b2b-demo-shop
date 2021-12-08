<?php

namespace Pyz\Zed\StringReverser\Business;

interface StringReverserFacadeInterface
{
    /**
     * Specification:
     * - Reverses a string.
     *
     * @param string $originalString
     *
     * @return string
     * @api
     */
    public function manipulateString(string $originalString): string;
}

<?php

namespace Pyz\Zed\StringReverser\Persistence;

interface StringReverserEntityManagerInterface
{
    public function saveStringManipulationCache(string $originalString, string $reversedString): void;
}

<?php

namespace Pyz\Zed\StringReverser\Persistence;

interface StringReverserRepositoryInterface
{
    public function findReversedByOriginal(string $originalString): ?string;
}

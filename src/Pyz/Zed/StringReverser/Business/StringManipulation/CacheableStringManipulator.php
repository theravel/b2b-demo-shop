<?php

namespace Pyz\Zed\StringReverser\Business\StringManipulation;

use Pyz\Zed\StringReverser\Persistence\StringReverserEntityManagerInterface;
use Pyz\Zed\StringReverser\Persistence\StringReverserRepositoryInterface;

class CacheableStringManipulator
{
    public function __construct(
        private StringReverserEntityManagerInterface $entityManager,
        private StringReverserRepositoryInterface $repository,
    ) {}

    public function reverse(string $originalString): string
    {
        $cachedResult = $this->repository->findReversedByOriginal($originalString);
        if (null !== $cachedResult) {
            return $cachedResult;
        } else {
            $reversedString = strrev($originalString);
            $this->entityManager->saveStringManipulationCache($originalString, $reversedString);

            return $reversedString;
        }
    }
}

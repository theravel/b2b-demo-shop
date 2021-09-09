<?php

namespace Pyz\Zed\StringReverser\Business\StringManipulation;

use Pyz\Zed\StringReverser\Persistence\StringReverserEntityManagerInterface;
use Pyz\Zed\StringReverser\Persistence\StringReverserRepositoryInterface;

class CacheableStringManipulator
{
    /**
     * @var StringReverserEntityManagerInterface
     */
    private $entityManager;

    /**
     * @var StringReverserRepositoryInterface
     */
    private $repository;

    public function __construct(
        StringReverserEntityManagerInterface $entityManager,
        StringReverserRepositoryInterface $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

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

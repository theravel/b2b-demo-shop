<?php

namespace Pyz\Zed\StringReverser\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class StringReverserRepository extends AbstractRepository implements StringReverserRepositoryInterface
{
    public function findReversedByOriginal(string $originalString): ?string
    {
        $entity = $this->getFactory()
            ->createStringReversalCacheQuery()
            ->filterByOriginalString($originalString)
            ->findOne();

        if (null === $entity) {
            return null;
        }

        return $entity->getReversedString();
    }
}

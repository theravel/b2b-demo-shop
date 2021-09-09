<?php

namespace Pyz\Zed\StringReverser\Persistence;

use Orm\Zed\StringReverser\Persistence\PyzStringReversalCache;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Pyz\Zed\StringReverser\Persistence\StringReverserPersistenceFactory getFactory()
 */
class StringReverserEntityManager extends AbstractEntityManager implements StringReverserEntityManagerInterface
{
    public function saveStringManipulationCache(string $originalString, string $reversedString): void
    {
        $stringReversalCacheEntity = new PyzStringReversalCache();
        $stringReversalCacheEntity->setOriginalString($originalString);
        $stringReversalCacheEntity->setReversedString($reversedString);

        $stringReversalCacheEntity->save();
    }
}

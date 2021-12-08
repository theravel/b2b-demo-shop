<?php

namespace Pyz\Zed\StringReverser\Persistence;

use Orm\Zed\StringReverser\Persistence\PyzStringReversalCacheQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class StringReverserPersistenceFactory extends AbstractPersistenceFactory
{
    public function createStringReversalCacheQuery(): PyzStringReversalCacheQuery
    {
        return PyzStringReversalCacheQuery::create();
    }
}

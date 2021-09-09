<?php

namespace Pyz\Zed\StringReverser\Business;

use Pyz\Zed\StringReverser\Business\StringManipulation\CacheableStringManipulator;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class StringReverserBusinessFactory extends AbstractBusinessFactory
{
    public function createStringManipulator(): CacheableStringManipulator
    {
        return new CacheableStringManipulator($this->getEntityManager(), $this->getRepository());
    }
}

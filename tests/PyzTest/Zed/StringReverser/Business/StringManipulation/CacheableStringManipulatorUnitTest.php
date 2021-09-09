<?php

namespace PyzTest\Zed\StringReverser\Business\StringManipulation;

use Codeception\Test\Unit;
use Pyz\Zed\StringReverser\Business\StringManipulation\CacheableStringManipulator;
use Pyz\Zed\StringReverser\Persistence\StringReverserEntityManagerInterface;
use Pyz\Zed\StringReverser\Persistence\StringReverserRepositoryInterface;

/**
 * @group PyzTest
 * @group Zed
 * @group StringReverser
 * @group Business
 * @group CacheableStringManipulatorUnitTest
 */
class CacheableStringManipulatorUnitTest extends Unit
{
    public function testCachedValueIsUsed(): void
    {
        $originalString = 'test_original_string';
        $reversedString = 'test_cached_value';

        $repositoryMock = $this->createRepositoryMock($originalString, $reversedString);
        $entityManagerMock = $this->createEntityManagerMock(0);

        $manipulator = new CacheableStringManipulator($entityManagerMock, $repositoryMock);
        $this->assertEquals($reversedString, $manipulator->reverse($originalString));
    }

    public function testCacheIsEmpty(): void
    {
        $originalString = 'test_original_string';
        $reversedString = 'gnirts_lanigiro_tset';

        $repositoryMock = $this->createRepositoryMock($originalString, null);
        $entityManagerMock = $this->createEntityManagerMock(1, $originalString, $reversedString);

        $manipulator = new CacheableStringManipulator($entityManagerMock, $repositoryMock);
        $this->assertEquals($reversedString, $manipulator->reverse($originalString));
    }

    private function createRepositoryMock(string $inputArgument, ?string $returnValue): StringReverserRepositoryInterface
    {
        $repositoryMock = $this->createMock(StringReverserRepositoryInterface::class);
        $repositoryMock->expects($this->once())
            ->method('findReversedByOriginal')
            ->with($inputArgument)
            ->willReturn($returnValue);

        return $repositoryMock;
    }

    private function createEntityManagerMock(int $invokedTimes, string $originalString = null, string $reversedString = null): StringReverserEntityManagerInterface
    {
        $entityManagerMock = $this->createMock(StringReverserEntityManagerInterface::class);
        $entityManagerMock->expects($this->exactly($invokedTimes))
            ->method('saveStringManipulationCache')
            ->with($originalString, $reversedString);

        return $entityManagerMock;
    }
}

<?php

namespace PyzTest\Zed\HelloSpryker\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\HelloSprykerBuilder;
use Generated\Shared\DataBuilder\StringReverserBuilder;
use Throwable;

/**
 * @group PyzTest
 * @group Zed
 * @group HelloSpryker
 * @group Business
 * @group Facade
 * @group HelloSprykerFacadeIntegrationTest
 * @group LearningTask
 */
class HelloSprykerFacadeIntegrationTest extends Unit
{
    /**
     * @var \PyzTest\Zed\HelloSpryker\HelloSprykerBusinessTester
     */
    protected $tester;

    public function testReverseStringSuccessAction(): void
    {
        $transferDto = (new HelloSprykerBuilder())->build();
        $expected = strrev($transferDto->getOriginalString());

        $actual = $this->tester->getFacade()->reverseString($transferDto);
        $this->assertEquals($expected, $actual->getReversedString());
    }

    public function testReverseTooLongStringErrorAction(): void
    {
        $transferDto = (new HelloSprykerBuilder([
            'originalString' => str_repeat('a', 129),
        ]))->build();

        $this->expectException(Throwable::class);
        $this->tester->getFacade()->reverseString($transferDto);
    }
}

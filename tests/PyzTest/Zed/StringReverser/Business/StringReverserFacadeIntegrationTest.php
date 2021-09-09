<?php

namespace PyzTest\Zed\StringReverser\Business;

use Codeception\Test\Unit;
use stdClass;
use Throwable;

/**
 * @group PyzTest
 * @group Zed
 * @group StringReverser
 * @group Business
 * @group Facade
 * @group StringReverserFacadeIntegrationTest
 * @group LearningTask
 */
class StringReverserFacadeIntegrationTest extends Unit
{
    /**
     * @var \PyzTest\Zed\StringReverser\StringReverserBusinessTester
     */
    protected $tester;

    /**
     * @dataProvider dataProviderStringIsReversed
     */
    public function testStringIsReversed(string $original, string $expected): void
    {
        $actual = $this->tester->getFacade()->manipulateString($original);
        $this->assertEquals($expected, $actual);
    }

    public function dataProviderStringIsReversed(): array
    {
        return [
            'empty' => [
                'original' => '',
                'expected' => '',
            ],
            'mirrored' => [
                'original' => 'exe',
                'expected' => 'exe',
            ],
            'normal' => [
                'original' => 'test',
                'expected' => 'tset',
            ],
            'long_128_chars' => [
                'original' => str_repeat('ab', 64),
                'expected' => str_repeat('ba', 64),
            ],
        ];
    }

    /**
     * @dataProvider dataProviderReversalException
     */
    public function testReversalException($original): void
    {
        $this->expectException(Throwable::class);
        $this->tester->getFacade()->manipulateString($original);
    }

    public function dataProviderReversalException(): array
    {
        return [
            'long_129_chars' => [
                'original' => str_repeat('a', 129),
            ],
            'null' => [
                'original' => null,
            ],
            'non_string' => [
                'original' => new stdClass(),
            ],
        ];
    }
}

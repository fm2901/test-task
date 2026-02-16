<?php

declare(strict_types=1);

namespace Tests\Services;

use PHPUnit\Framework\TestCase;
use App\Services\ArrayTransformer;

final class ArrayTransformerTest extends TestCase
{
    private ArrayTransformer $transformer;

    protected function setUp(): void
    {
        $this->transformer = new ArrayTransformer();
    }

    public function testTransformReturnsCorrectArray(): void
    {
        $input = [
            ['A' => 1, 'B' => 'x', 'C' => 'one'],
            ['A' => 2, 'B' => 'y', 'C' => 'two'],
        ];

        $expected = [
            'x' => 'one',
            'y' => 'two',
        ];

        $result = $this->transformer->transform($input);

        $this->assertSame($expected, $result);
    }

    public function testTransformWithEmptyArray(): void
    {
        $result = $this->transformer->transform([]);

        $this->assertSame([], $result);
    }

    public function testTransformOverridesDuplicateKeys(): void
    {
        $input = [
            ['A' => 1, 'B' => 'x', 'C' => 'one'],
            ['A' => 2, 'B' => 'x', 'C' => 'two'],
        ];

        $result = $this->transformer->transform($input);

        $this->assertSame(['x' => 'two'], $result);
    }

    public function testTransformWithNumericKeys(): void
    {
        $input = [
            ['A' => 1, 'B' => 100, 'C' => 'one'],
            ['A' => 2, 'B' => 200, 'C' => 'two'],
        ];

        $expected = [
            100 => 'one',
            200 => 'two',
        ];

        $result = $this->transformer->transform($input);

        $this->assertSame($expected, $result);
    }
}

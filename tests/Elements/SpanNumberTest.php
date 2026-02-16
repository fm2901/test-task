<?php
declare(strict_types=1);

namespace Tests\Elements;

use PHPUnit\Framework\TestCase;
use App\Elements\SpanNumber;

final class SpanNumberTest extends TestCase
{
    public function testRenderFormattedNumber(): void
    {
        $span = new SpanNumber(
            id: 'price',
            class: 'number',
            value: 1234.5
        );

        $html = $span->render();

        $this->assertStringContainsString('<span', $html);
        $this->assertStringContainsString('id="price"', $html);
        $this->assertStringContainsString('class="number"', $html);

        // Проверяем форматирование (по умолчанию 2 знака)
        $this->assertStringContainsString('1,234.50', $html);
    }

    public function testRenderWithNullValue(): void
    {
        $span = new SpanNumber(
            id: 'empty',
            class: null,
            value: null
        );

        $html = $span->render();

        // span должен быть, но без значения
        $this->assertStringContainsString('<span', $html);
        $this->assertStringContainsString('</span>', $html);
    }

    public function testDifferentNumberFormatting(): void
    {
        $span = new SpanNumber(value: 1000);

        $html = $span->render();

        $this->assertStringContainsString('1,000.00', $html);
    }
}

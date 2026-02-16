<?php
declare(strict_types=1);

namespace Tests\Elements;

use PHPUnit\Framework\TestCase;
use App\Elements\SpanText;

final class SpanTextTest extends TestCase
{
    public function testHtmlEscaping(): void
    {
        $span = new SpanText(value: '<script>alert(1)</script>');

        $html = $span->render();

        $this->assertStringNotContainsString('<script>', $html);
        $this->assertStringContainsString('&lt;script&gt;', $html);
    }
}

<?php
declare(strict_types=1);

namespace Tests\Elements;

use PHPUnit\Framework\TestCase;
use App\Elements\Link;

final class LinkTest extends TestCase
{
    public function testRenderBasicLink(): void
    {
        $link = new Link(
            href: 'https://example.com',
            id: 'link1',
            class: 'btn',
            text: 'Click me'
        );

        $html = $link->render();

        $this->assertStringContainsString('<a', $html);
        $this->assertStringContainsString('href="https://example.com"', $html);
        $this->assertStringContainsString('id="link1"', $html);
        $this->assertStringContainsString('class="btn"', $html);
        $this->assertStringContainsString('>Click me<', $html);
    }

    public function testLinkEscapesHtml(): void
    {
        $link = new Link(
            href: 'https://example.com',
            text: '<b>Bold</b>'
        );

        $html = $link->render();

        $this->assertStringNotContainsString('<b>', $html);
        $this->assertStringContainsString('&lt;b&gt;', $html);
    }

    public function testLinkWithoutOptionalAttributes(): void
    {
        $link = new Link('https://example.com');

        $html = $link->render();

        $this->assertStringContainsString('href="https://example.com"', $html);
        $this->assertStringNotContainsString('id=', $html);
        $this->assertStringNotContainsString('class=', $html);
    }
}

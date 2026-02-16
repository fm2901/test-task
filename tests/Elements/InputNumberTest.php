<?php
declare(strict_types=1);

namespace Tests\Elements;

use PHPUnit\Framework\TestCase;
use App\Elements\InputNumber;

final class InputNumberTest extends TestCase
{
    public function testNumberFormatting(): void
    {
        $input = new InputNumber(
            id: 'price',
            class: null,
            name: 'price',
            value: 1234.5
        );

        $html = $input->render();

        $this->assertStringContainsString('type="number"', $html);
        $this->assertStringContainsString('1,234.50', $html);
    }
}

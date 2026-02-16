<?php
declare(strict_types=1);

namespace Tests\Elements;

use PHPUnit\Framework\TestCase;
use App\Elements\InputText;

final class InputTextTest extends TestCase
{
    public function testRenderBasicInput(): void
    {
        $input = new InputText(
            id: 'username',
            class: 'form-control',
            name: 'username',
            value: 'John'
        );

        $html = $input->render();

        $this->assertStringContainsString('type="text"', $html);
        $this->assertStringContainsString('id="username"', $html);
        $this->assertStringContainsString('class="form-control"', $html);
        $this->assertStringContainsString('name="username"', $html);
        $this->assertStringContainsString('value="John"', $html);
    }

    public function testRenderWithPlaceholderAndRequired(): void
    {
        $input = (new InputText('id1', null, 'field', 'test'))
            ->setPlaceholder('Enter value')
            ->setRequired();

        $html = $input->render();

        $this->assertStringContainsString('placeholder="Enter value"', $html);
        $this->assertStringContainsString('required="required"', $html);
    }
}

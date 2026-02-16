<?php
declare(strict_types=1);

namespace App\Elements;

use App\Traits\NumberFormatTrait;

class SpanNumber extends SpanText
{
    use NumberFormatTrait;

    public function render(): string
    {
        $formatted = $this->value !== null
            ? $this->formatNumber((float)$this->value)
            : '';

        return sprintf(
            '<span%s>%s</span>',
            $this->renderAttributes([
                'id' => $this->id,
                'class' => $this->class,
            ]),
            $formatted
        );
    }
}

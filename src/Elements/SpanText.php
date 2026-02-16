<?php
declare(strict_types=1);

namespace App\Elements;

use App\Core\HtmlElement;

class SpanText extends HtmlElement
{
    public function __construct(
        ?string $id = null,
        ?string $class = null,
        mixed $value = null
    )
    {
        parent::__construct($id, $class, null, $value);
    }

    public function render(): string
    {
        return sprintf(
            '<span%s>%s</span>',
            $this->renderAttributes([
                'id' => $this->id,
                'class' => $this->class,
            ]),
            htmlspecialchars((string)$this->value)
        );
    }
}

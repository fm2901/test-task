<?php
declare(strict_types=1);

namespace App\Elements;

use App\Core\HtmlElement;

class Link extends HtmlElement
{
    private string $href;

    public function __construct(
        string  $href,
        ?string $id = null,
        ?string $class = null,
        ?string $text = null
    )
    {
        parent::__construct($id, $class, null, $text);
        $this->href = $href;
    }

    public function render(): string
    {
        return sprintf(
            '<a%s>%s</a>',
            $this->renderAttributes([
                'id' => $this->id,
                'class' => $this->class,
                'href' => $this->href,
            ]),
            htmlspecialchars((string)$this->value)
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Elements;

use App\Core\HtmlElement;
use App\Traits\EditableTrait;

class InputText extends HtmlElement
{
    use EditableTrait;

    public function __construct(
        ?string $id = null,
        ?string $class = null,
        ?string $name = null,
        ?string $value = null
    )
    {
        parent::__construct($id, $class, $name, $value);
    }

    public function render(): string
    {
        return sprintf(
            '<input type="text"%s>',
            $this->renderAttributes([
                'id' => $this->id,
                'class' => $this->class,
                'name' => $this->name,
                'value' => $this->value,
                'placeholder' => $this->placeholder,
                'required' => $this->required ? 'required' : null,
            ])
        );
    }
}

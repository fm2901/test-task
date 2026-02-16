<?php
declare(strict_types=1);

namespace App\Elements;

use App\Traits\NumberFormatTrait;

class InputNumber extends InputText
{
    use NumberFormatTrait;

    public function __construct(
        ?string        $id = null,
        ?string        $class = null,
        ?string        $name = null,
        int|float|null $value = null
    )
    {
        parent::__construct($id, $class, $name, $value !== null ? (string)$value : null);
    }

    public function render(): string
    {
        $value = $this->value !== null
            ? $this->formatNumber((float)$this->value)
            : null;

        return sprintf(
            '<input type="number"%s>',
            $this->renderAttributes([
                'id' => $this->id,
                'class' => $this->class,
                'name' => $this->name,
                'value' => $value,
                'placeholder' => $this->placeholder,
                'required' => $this->required ? 'required' : null,
            ])
        );
    }
}

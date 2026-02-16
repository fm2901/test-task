<?php


namespace App\Core;

abstract class HtmlElement
{
    protected ?string $id;
    protected ?string $class;
    protected ?string $name;
    protected mixed $value;

    public function __construct(
        ?string $id = null,
        ?string $class = null,
        ?string $name = null,
        mixed   $value = null
    )
    {
        $this->id = $id;
        $this->class = $class;
        $this->name = $name;
        $this->value = $value;
    }

    protected function renderAttributes(array $attributes): string
    {
        $result = '';

        foreach ($attributes as $key => $value) {
            if ($value !== null) {
                $result .= sprintf(
                    ' %s="%s"',
                    $key,
                    htmlspecialchars((string)$value)
                );
            }
        }

        return $result;
    }

    abstract public function render(): string;
}

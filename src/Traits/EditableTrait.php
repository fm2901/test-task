<?php
declare(strict_types=1);

namespace App\Traits;

trait EditableTrait
{
    protected ?string $placeholder = null;
    protected bool $required = false;

    public function setPlaceholder(string $placeholder): static
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function setRequired(bool $required = true): static
    {
        $this->required = $required;
        return $this;
    }
}

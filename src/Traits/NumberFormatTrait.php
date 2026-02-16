<?php
declare(strict_types=1);

namespace App\Traits;

trait NumberFormatTrait
{
    protected int $decimals = 2;
    protected string $decimalSeparator = '.';
    protected string $thousandsSeparator = ',';

    public function formatNumber(float|int $number): string
    {
        return number_format(
            $number,
            $this->decimals,
            $this->decimalSeparator,
            $this->thousandsSeparator
        );
    }
}

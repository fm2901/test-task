<?php


namespace App\Services;

class ArrayTransformer
{
    public function transform(array $data): array
    {
        return array_column($data, 'C', 'B');
    }
}

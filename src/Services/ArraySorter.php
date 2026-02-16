<?php


namespace App\Services;

class ArraySorter
{
    public function sort(array $array): array
    {
        sort($array);
        return $array;
    }

    public function countingSort(array $array): array
    {
        $count = array_fill(0, 1025, 0);

        foreach ($array as $value) {
            $count[$value]++;
        }

        $result = [];

        for ($i = 0; $i <= 1024; $i++) {
            while ($count[$i] > 0) {
                $result[] = $i;
                $count[$i]--;
            }
        }

        return $result;
    }
}

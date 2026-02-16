<?php


require __DIR__ . '/../vendor/autoload.php';

use App\Services\ArrayTransformer;
use App\Services\ArraySorter;

// Задача 1
$transformer = new ArrayTransformer();
$data = [
    ['A' => 1, 'B' => 'a', 'C' => 'apple'],
    ['A' => 2, 'B' => 'b', 'C' => 'banana'],
];

$result1 = $transformer->transform($data);

// Задача 3
$sorter = new ArraySorter();
$array = [5, 2, 9, 1, 0, 1024, 512];
$result3 = $sorter->countingSort($array);

echo "<pre>";
echo "data:\n";
var_dump($data);
echo "Transform result:\n";
print_r($result1);


echo "\nData:\n";
var_dump($array);
echo "\nSorted result:\n";
print_r($result3);
echo "</pre>";
